<?php

namespace App\Http\Controllers;

use App\Models\Activit;
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
            $atividades = Activit::all();
            return view('activities.index', compact('atividades'));
        }

        return view('welcome');
    }
}
