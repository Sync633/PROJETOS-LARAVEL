<?php

use App\Http\Controllers\FirstController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/teste', function() {
    return "Testando outra rota";
});

Route::get('/primeirapagina', [FirstController::class, 'index']);