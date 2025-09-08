<?php

use App\Http\Controllers\AtividadeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GoalController;
use App\Http\Controllers\RememberController;
use App\Http\Controllers\RelatoryController;

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('atividades', AtividadeController::class);
Route::resource('goals', GoalController::class);
Route::resource('remembers', RememberController::class);
Route::resource('homes', RememberController::class);

Route::apiResource('relatories', RelatoryController::class);
Route::get('relatories-chart', [RelatoryController::class, 'chartData']);
Route::delete('/remembers/{id}', [RememberController::class, 'destroy'])->name('remembers.destroy');
