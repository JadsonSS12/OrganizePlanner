<?php

use App\Http\Controllers\AtividadeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GoalController;
use App\Http\Controllers\RememberController;
use App\Http\Controllers\TesteController;

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('atividades', AtividadeController::class);
Route::resource('goals', GoalController::class);
Route::resource('remembers', RememberController::class);
Route::resource('homes', RememberController::class);