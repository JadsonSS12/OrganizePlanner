<?php

namespace App\Http\Controllers;

use App\Models\Relatory;
use Illuminate\Http\Request;

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
}
