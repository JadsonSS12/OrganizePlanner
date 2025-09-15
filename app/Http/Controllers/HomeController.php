<?php

namespace App\Http\Controllers;

use App\Models\Atividade;
use App\Models\Remember;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
     public function index()
    {
        $remembers = Remember::all();

        // Mantenha a sua lógica existente para carregar as atividades
        // Exemplo: $atividades = Atividade::all();

        // Retorna a view, passando tanto os lembretes quanto as atividades
        return view('home', [
            'remembers' => $remembers,
        ]);
    
    }
}
