<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

Route::get('/', function () {
    $title = 'Página principal';
    return view('home.index', compact('title'));
})->name('home');

Route::get('/about', [HomeController::class, 'about'])->name('about');
