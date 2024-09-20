<?php

use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

Route::get('/task', [TaskController::class, 'index'])->name('task.index');
Route::get('/task/create', [TaskController::class, 'create'])->name('task.create');
Route::post('/task/store', [TaskController::class, 'store'])->name('task.store');

Route::delete('/task/{id}', [TaskController::class, 'destroy'])->name('task.destroy');

Route::get('/task/{id}', [TaskController::class, 'edit'])->name('task.edit');
Route::put('/task/update/{id}', [TaskController::class, 'update'])->name('task.update');