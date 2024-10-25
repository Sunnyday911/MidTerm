<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/event', function () {
    return view('event');
})->middleware(['auth', 'verified'])->name('event');

Route::get('/peserta', function () {
    return view('peserta');
})->middleware(['auth', 'verified'])->name('peserta');

Route::get('/event', [ItemController::class, 'showEventPage'])->name('event');
Route::post('/items', [ItemController::class, 'store'])->name('items.store');

Route::resource('items', ItemController::class);

Route::get('items/{id}/edit', [ItemController::class, 'editttsss'])->name('items.edit');
Route::put('items/{id}', [ItemController::class, 'update'])->name('items.update');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
