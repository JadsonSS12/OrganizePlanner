<?php

use App\Http\Controllers\AtividadeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GoalController;
use App\Http\Controllers\RememberController;
use App\Http\Controllers\RelatoryController;

Auth::routes();

Route::get('/', [AtividadeController::class, 'index'])->name('home');

Route::resource('atividades', AtividadeController::class);
Route::resource('goals', GoalController::class);
Route::resource('remembers', RememberController::class);
Route::resource('homes', RememberController::class);
Route::delete('/remembers/{id}', [RememberController::class, 'destroy'])->name('remembers.destroy');

Route::get('/relatories/dashboard', [RelatoryController::class, 'dashboard'])->name('relatories.dashboard');
