<?php

use App\Http\Controllers\ActivitController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GoalController;

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('atividades', ActivitController::class);
Route::resource('goals', GoalController::class);