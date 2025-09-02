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
    public function index(){
         $atividades = Atividade::all();
            
            // Busca os lembretes para a data de hoje
            $lembretesProximos = Remember::whereDate('dateTime', Carbon::today())->get();

            // Passa tanto as atividades quanto os lembretes para a view
            return view('atividades.index', compact('atividades', 'lembretesProximos'));
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

    }
    public function update(Request $resquest, $atividade_id){

    }

    public function destroy($atividade_id){

    }

}
