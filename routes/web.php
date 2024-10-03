<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MessageController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/sendmessage', [MessageController::class, 'create'])->name('sendmessage.create');
    Route::post('/send', [MessageController::class, 'store'])->name('messages.store');
    Route::get('/sent', [MessageController::class, 'index'])->name('messages.index');
});

require __DIR__.'/auth.php';
