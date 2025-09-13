<?php

namespace App\Http\Controllers;

use App\Models\Relatory;
use App\Models\Goal;
use App\Models\Atividade;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RelatoryController extends Controller
{
    public function index()
    {
        // Lista todos relatórios
        $relatories = Relatory::all();
        return response()->json($relatories);
    }

    public function store(Request $request)
    {
        $relatory = Relatory::create($request->all());
        return response()->json($relatory, 201);
    }

    public function show($id)
    {
        $relatory = Relatory::findOrFail($id);
        return response()->json($relatory);
    }

    public function update(Request $request, $id)
    {
        $relatory = Relatory::findOrFail($id);
        $relatory->update($request->all());
        return response()->json($relatory);
    }

    public function destroy($id)
    {
        Relatory::destroy($id);
        return response()->json(null, 204);
    }

    // Método específico para gráficos
    public function chartData()
    {
        $data = Relatory::selectRaw('DATE(data_inicio) as date, SUM(valor_total) as total')
            ->groupBy('date')
            ->orderBy('date')
            ->get();

        return response()->json($data);
    }
    public function dashboard()
    {
        // ---- Metas ----
        $totalGoals = Goal::count();
        $sucessoGoals = Goal::where('status', 'Sucesso')->count();
        $semSucessoGoals = Goal::where('status', 'SemSucesso')->count();
        $parcialGoals = Goal::where('status', 'ParcialmenteAtingida')->count();

        $percentSucesso = $totalGoals > 0 ? round(($sucessoGoals / $totalGoals) * 100, 2) : 0;

        // ---- Atividades ----
        $totalAtividades = Atividade::count();
        $pendentes = Atividade::where('status', Atividade::STATUS_PENDENTE)->count();
        $andamento = Atividade::where('status', Atividade::STATUS_EM_ANDAMENTO)->count();
        $concluidas = Atividade::where('status', Atividade::STATUS_CONCLUIDA)->count();
        $canceladas = Atividade::where('status', Atividade::STATUS_CANCELADA)->count();

        $percentConcluidas = $totalAtividades > 0 ? round(($concluidas / $totalAtividades) * 100, 2) : 0;

        // Categoria mais usada
        $categoriaTop = Atividade::select('category_id', DB::raw('count(*) as total'))
            ->with('categoria')
            ->groupBy('category_id')
            ->orderByDesc('total')
            ->first();

        // Turno mais produtivo
        $turnos = [
            'manha' => Atividade::whereBetween('hora_inicio', ['06:00:00', '12:00:00'])->where('status', 'concluida')->count(),
            'tarde' => Atividade::whereBetween('hora_inicio', ['12:00:01', '18:00:00'])->where('status', 'concluida')->count(),
            'noite' => Atividade::whereBetween('hora_inicio', ['18:00:01', '23:59:59'])->where('status', 'concluida')->count(),
        ];
        $turnoProdutivo = array_search(max($turnos), $turnos);

        return view('relatories.dashboard', [
            'totalGoals' => $totalGoals,
            'sucessoGoals' => $sucessoGoals,
            'semSucessoGoals' => $semSucessoGoals,
            'parcialGoals' => $parcialGoals,
            'percentSucesso' => $percentSucesso,

            'totalAtividades' => $totalAtividades,
            'pendentes' => $pendentes,
            'andamento' => $andamento,
            'concluidas' => $concluidas,
            'canceladas' => $canceladas,
            'percentConcluidas' => $percentConcluidas,

            'categoriaTop' => $categoriaTop,
            'turnoProdutivo' => $turnoProdutivo,
        ]);
    }
}
