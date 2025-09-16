<?php

namespace App\Http\Controllers;

use App\Models\Atividade;
use App\Models\Remember;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Carbon\CarbonInterval;
use Carbon\CarbonPeriod;

class AtividadeController extends Controller
{
    public function index(Request $request){
        if (Auth::check()) {
            
            $semanaOffset = (int) $request->query('week', 0); // 0 = atual, -1 = anterior, +1 = próxima
            $dia_atual = Carbon::now()->addWeeks($semanaOffset);

            $domingo = $dia_atual->copy()->startOfWeek(Carbon::SUNDAY)->startOfDay();
            $sabado = $dia_atual->copy()->endOfWeek(Carbon::SATURDAY)->endOfWeek();

            $datas_semana = CarbonPeriod::create($domingo,  '1 day', $sabado)->toArray();

            $atividades = Atividade::whereBetween('data', [$domingo, $sabado])
                            ->get();
            $atividades_agrupadas =  $atividades->groupBy(fn($a) => (int) (
                $a->data instanceof Carbon
                    ? $a->data->dayOfWeek
                    : Carbon::parse($a->data)->dayOfWeek
            ))
            ->mapWithKeys(function ($colDoDia, $dayKey) {
                $hours = $colDoDia
                ->groupBy(function ($atividade) {
                    // Converte a hora de início para um objeto Carbon
                    $horaInicio = Carbon::parse($atividade->hora_inicio);

                    // Calcula o total de minutos desde o início do dia (00:00)
                    $totalMinutos = $horaInicio->hour * 60 + $horaInicio->minute;

                    // Calcula o total de minutos desde o início da grade da agenda (06:00)
                    $minutosDesdeSeis = $totalMinutos - (6 * 60);

                    // Se a atividade for antes das 06:00, não a exibe na grade principal
                    if ($minutosDesdeSeis < 0) {
                        return -1; // Retorna um grupo que não será renderizado
                    }
                    
                    // Calcula o índice do bloco de 30 minutos (0 para 06:00, 1 para 06:30, etc.)
                    return floor($minutosDesdeSeis / 30);
                })
                ->filter(fn($v, $k) => $k >= 0)
                    ->mapWithKeys(fn($items, $hourKey) => [(int) $hourKey => $items->values()])
                    ->sortKeys();

                return [(int) $dayKey => $hours];
            })
            ->sortKeys();
            // busca os lembretes pra data de hoje
            $lembretesProximos = Remember::whereDate('dateTime', Carbon::today())->get();

            return view('atividades.index', compact('atividades_agrupadas', 'lembretesProximos', 'semanaOffset', 'datas_semana'));
        }

        return view('welcome');
    }

    public function show($atividade_id){
        $atividade = Atividade::find($atividade_id);

        return view('atividades.show', compact('atividade'));
    }
    public function create(){

        $categorias = Category::all();

        return view('atividades.create', compact('categorias'));
    }
    public function store(Request $request){

        if($request->tipo_bloco === 'turno'){
            if($request->turno === 'manha'){
                $horario_inicio = '06:00:00';
            }else if($request->turno === 'tarde'){
                $horario_inicio = '12:00:01';
            }else if($request->turno === 'noite'){
                $horario_inicio = '18:00:01';
            }
            $request->merge([
                'hora_inicio'   => $horario_inicio,
            ]);
        }

        Atividade::create(array_merge($request->all(), ['status' => 'pendente', 'user_id' => Auth::user()->id]));

        return redirect()->route('atividades.index')->with('success', 'Atividade criada com sucesso!');
    }

    

    public function edit($atividade_id){
        $atividade = Atividade::findOrFail($atividade_id);

        $categorias = Category::all();

        return view('atividades.edit', compact('atividade', 'categorias'));

    }
    public function update(Request $request, $atividade_id){
        $atividade = Atividade::findOrFail($atividade_id);

        if(!$atividade){
            return redirect()->back()->with("Atividade não encontrada");
        }
        $atividade->update([
            'nome'=>$request->nome,
            'descricao'=> $request->descricao,
            'status'=> $request->status,
            'data'=> $request->data,
            'category_id' => $request->category_id,
            'user_id' => Auth::id(),
            'hora_inicio'=>$request->hora_inicio,
            'hora_fim'=>$request->hora_fim,

        ]);
        return redirect()->route('atividades.index')->with('success', 'Atividade atualizada com sucesso!');
    }

    public function destroy($atividade_id){
        $atividade = Atividade::findOrFail($atividade_id);

        if(!$atividade_id){
            return redirect()->back()->with("Atividade não encontrada");
        }

        $atividade->delete();
        return redirect()->route('atividades.index')->with("success", 'atividade deletada');
    }

}
