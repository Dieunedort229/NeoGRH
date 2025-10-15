<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

    Route::get('/projets', [App\Http\Controllers\ProjetController::class, 'index'])->name('projets.index');
    Route::get('/projets/create', [App\Http\Controllers\ProjetController::class, 'create'])->name('projets.create');
    Route::get('/personnel', [App\Http\Controllers\PersonnelController::class, 'index'])->name('personnel.index');
    Route::get('/personnel/create', [App\Http\Controllers\PersonnelController::class, 'create'])->name('personnel.create');
    Route::get('/prestataires', [App\Http\Controllers\PrestataireController::class, 'index'])->name('prestataires.index');
    Route::get('/banques', [App\Http\Controllers\BanqueController::class, 'index'])->name('banques.index');
    Route::get('/partenaires', [App\Http\Controllers\PartenaireController::class, 'index'])->name('partenaires.index');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
