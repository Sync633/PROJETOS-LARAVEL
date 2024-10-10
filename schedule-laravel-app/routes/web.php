<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/task', [TaskController::class, 'index'])->middleware(['auth'])->name('task.index');
Route::get('/task/create', [TaskController::class, 'create'])->middleware(['auth'])->name('task.create');
Route::post('/task/store', [TaskController::class, 'store'])->middleware(['auth'])->name('task.store');
Route::delete('/task/{id}', [TaskController::class, 'destroy'])->middleware(['auth'])->name('task.destroy');
Route::get('/task/{id}', [TaskController::class, 'edit'])->middleware(['auth'])->name('task.edit');
Route::put('/task/update/{id}', [TaskController::class, 'update'])->middleware(['auth'])->name('task.update');

require __DIR__.'/auth.php';
