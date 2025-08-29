<?php

namespace App\Http\Controllers;

use App\Models\Atividade;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (Auth::check()) {
            $atividades = Atividade::all();
            return view('atividades.index', compact('atividades'));
        }

        return view('welcome');
    }
}
