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
        if (Auth::check()) {
            $atividades = Atividade::all();
             // Lógica para encontrar lembretes próximos
            $lembretesProximos = Remember::whereDate('dateTime', Carbon::today())->get();

            return view('home', compact('atividades', 'lembretesProximos'));
            //return view('atividades.index', compact('atividades'));
        }

        return view('welcome');
    }
}
