<?php

namespace App\Http\Controllers;

use App\Models\Activit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ActivitController extends Controller
{
    public function index(){
        $atividades = Activit::where('user_id', Auth::user()->id)->get();

        return view('activities.index', compact('atividades'));
    }
    public function show($activit_id){
        $atividade = Activit::find($activit_id);

        return view('activities.show', compact('atividade'));
    }
    public function create(){
        return view('activities.create');
    }
    public function store(Resquest $resquest){

    }
    public function edit($activit_id){

    }
    public function update(Resquest $resquest, $activit_id){

    }

    public function destroy($activit_id){

    }

}
