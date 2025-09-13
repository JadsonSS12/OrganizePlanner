<?php

namespace App\Http\Controllers;

use App\Models\Atividade;
use App\Models\Remember;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class AtividadeController extends Controller
{
    public function index(Request $request){
        $semanaOffset = (int) $request->query('week', 0); // 0 = atual, -1 = anterior, +1 = próxima
        $dia_atual = Carbon::now()->addWeeks($semanaOffset);

        $domingo = $dia_atual->copy()->startOfWeek(Carbon::SUNDAY)->startOfDay();
        $sabado = $dia_atual->copy()->endOfWeek(Carbon::SATURDAY)->endOfWeek();

        $atividades = Atividade::whereBetween('data', [$domingo, $sabado])
                        ->get();
        $atividades_agrupadas =  $atividades->groupBy(fn($a) => (int) (
            $a->data instanceof Carbon
                ? $a->data->dayOfWeek
                : Carbon::parse($a->data)->dayOfWeek
        ))
        ->mapWithKeys(function ($colDoDia, $dayKey) {
            $hours = $colDoDia
                ->groupBy(fn($a) => (int) (
                    $a->hora_inicio instanceof Carbon
                        ? (int) $a->hora_inicio->format('H')
                        : (int) Carbon::parse($a->hora_inicio)->format('H')
                ))
                ->mapWithKeys(fn($items, $hourKey) => [(int) $hourKey => $items->values()])
                ->sortKeys();

            return [(int) $dayKey => $hours];
        })
        ->sortKeys();
        // Busca os lembretes para a data de hoje
        $lembretesProximos = Remember::whereDate('dateTime', Carbon::today())->get();

        return view('atividades.index', compact('atividades_agrupadas', 'lembretesProximos', 'semanaOffset'));
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
        Atividade::create(array_merge($request->all(), ['status' => 'pendente', 'user_id' => Auth::user()->id]));

        return redirect()->route('atividades.index')->with('success', 'Atividade criada com sucesso!');
    }
    public function edit($atividade_id){
        $atividade = Atividade::findOrFail($atividade_id);
        return view('atividades.edit', compact('atividade'));

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
        return redirect()->route('atividade.index')->with("success", 'atividade deletada');
    }

}
