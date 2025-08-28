<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Remember;
use App\Models\Enum\TypeRemember;

class RememberController extends Controller{

    public function index()
{
    $remembers = Remember::all();
        return view('remember.remember', compact('remembers'));
}



    public function create()
    {
        $types = TypeRemember::cases();
        return view('remember.create', compact('types'));
    }

    public function store(Request $request)
    {
        
         $request->validate([
            'title' => 'required|string',
            'description' => 'nullable|string',
            'typeRemember' => 'required',
            'semanal' => 'boolean',
            'dateTime' => 'required|date'
        ]);
    
        
       Remember::create($request->only(keys: [
            'title',
            'description',
            'typeRemember',
            'semanal',
            'dateTime'
            ]));


       
    
        return redirect()->route('remembers.index')->with('success', 'Lembrete criado com sucesso!');
    }
}