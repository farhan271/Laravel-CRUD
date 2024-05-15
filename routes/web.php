<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('crud',  [App\Http\Controllers\CrudController::class, 'index'])->name('crud');
Route::get('crud/create',  [App\Http\Controllers\CrudController::class, 'create']);
Route::post('crud/create',  [App\Http\Controllers\CrudController::class, 'store']);
Route::get('crud/{id}/edit',  [App\Http\Controllers\CrudController::class, 'edit']);
Route::put('crud/{id}/edit', [App\Http\Controllers\CrudController::class, 'update']);
Route::get('crud/{id}/delete', [App\Http\Controllers\CrudController::class, 'destroy']);



Route::get('/', function () {
    return view('frontend.index');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
