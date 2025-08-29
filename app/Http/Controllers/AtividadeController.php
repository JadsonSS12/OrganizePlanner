<?php

namespace App\Http\Controllers;

use App\Models\Atividade;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AtividadeController extends Controller
{
    public function index(){
        $atividades = Atividade::where('user_id', Auth::user()->id)->get();

        return view('atividades.index', compact('atividades'));
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
