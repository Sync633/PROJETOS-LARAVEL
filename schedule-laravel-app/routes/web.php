<?php

use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

Route::get('/task', [TaskController::class, 'index'])->name('task.index');
Route::get('/task/create', [TaskController::class, 'create'])->name('task.create');
Route::get('/task/store', [TaskController::class, 'store'])->name('task.store');
Route::get('/task/{id}', [TaskController::class, 'destroy'])->name('task.destroy');