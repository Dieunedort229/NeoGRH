<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    $stats = [
        'personnel' => \App\Models\Personnel::count(),
        'projets' => \App\Models\Projet::count(),
        'partenaires' => \App\Models\Partenaire::count(),
        'banques' => \App\Models\Banque::count(),
        'prestataires' => \App\Models\Prestataire::count(),
        'projets_actifs' => \App\Models\Projet::where('statut', 'En cours')->count(),
        'budget_total' => \App\Models\Projet::sum('budget_total'),
        'budget_utilise' => \App\Models\Projet::sum('budget_utilise'),
        'solde_total' => \App\Models\Banque::sum('solde_actuel'),
    ];
    
    $recent_personnel = \App\Models\Personnel::latest()->take(5)->get();
    $recent_projets = \App\Models\Projet::latest()->take(5)->get();
    $recent_partenaires = \App\Models\Partenaire::latest()->take(5)->get();
    
    return view('dashboard', compact('stats', 'recent_personnel', 'recent_projets', 'recent_partenaires'));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/test-form', function () {
    return view('test-form');
})->middleware(['auth', 'verified'])->name('test-form');

// Routes protégées par SuperAdmin pour la gestion NGO
Route::middleware(['auth', 'ensure.superadmin'])->group(function () {
    // Routes Personnel
    Route::get('/personnel', [App\Http\Controllers\PersonnelController::class, 'index'])->name('personnel.index');
    Route::get('/personnel/create', [App\Http\Controllers\PersonnelController::class, 'create'])->name('personnel.create');
    Route::post('/personnel', [App\Http\Controllers\PersonnelController::class, 'store'])->name('personnel.store');
    Route::get('/personnel/{personnel}', [App\Http\Controllers\PersonnelController::class, 'show'])->name('personnel.show');
    Route::get('/personnel/{personnel}/edit', [App\Http\Controllers\PersonnelController::class, 'edit'])->name('personnel.edit');
    Route::put('/personnel/{personnel}', [App\Http\Controllers\PersonnelController::class, 'update'])->name('personnel.update');
    Route::delete('/personnel/{personnel}', [App\Http\Controllers\PersonnelController::class, 'destroy'])->name('personnel.destroy');
    
    // Routes Projets
    Route::get('/projets', [App\Http\Controllers\ProjetController::class, 'index'])->name('projets.index');
    Route::get('/projets/create', [App\Http\Controllers\ProjetController::class, 'create'])->name('projets.create');
    Route::post('/projets', [App\Http\Controllers\ProjetController::class, 'store'])->name('projets.store');
    Route::get('/projets/{projet}', [App\Http\Controllers\ProjetController::class, 'show'])->name('projets.show');
    Route::get('/projets/{projet}/edit', [App\Http\Controllers\ProjetController::class, 'edit'])->name('projets.edit');
    Route::put('/projets/{projet}', [App\Http\Controllers\ProjetController::class, 'update'])->name('projets.update');
    Route::delete('/projets/{projet}', [App\Http\Controllers\ProjetController::class, 'destroy'])->name('projets.destroy');
    
    // Routes Prestataires
    Route::get('/prestataires', [App\Http\Controllers\PrestataireController::class, 'index'])->name('prestataires.index');
    Route::get('/prestataires/create', [App\Http\Controllers\PrestataireController::class, 'create'])->name('prestataires.create');
    Route::post('/prestataires', [App\Http\Controllers\PrestataireController::class, 'store'])->name('prestataires.store');
    Route::get('/prestataires/{prestataire}', [App\Http\Controllers\PrestataireController::class, 'show'])->name('prestataires.show');
    Route::get('/prestataires/{prestataire}/edit', [App\Http\Controllers\PrestataireController::class, 'edit'])->name('prestataires.edit');
    Route::put('/prestataires/{prestataire}', [App\Http\Controllers\PrestataireController::class, 'update'])->name('prestataires.update');
    Route::delete('/prestataires/{prestataire}', [App\Http\Controllers\PrestataireController::class, 'destroy'])->name('prestataires.destroy');
    
    // Routes Banques
    Route::get('/banques', [App\Http\Controllers\BanqueController::class, 'index'])->name('banques.index');
    Route::get('/banques/create', [App\Http\Controllers\BanqueController::class, 'create'])->name('banques.create');
    Route::post('/banques', [App\Http\Controllers\BanqueController::class, 'store'])->name('banques.store');
    Route::get('/banques/{banque}', [App\Http\Controllers\BanqueController::class, 'show'])->name('banques.show');
    Route::get('/banques/{banque}/edit', [App\Http\Controllers\BanqueController::class, 'edit'])->name('banques.edit');
    Route::put('/banques/{banque}', [App\Http\Controllers\BanqueController::class, 'update'])->name('banques.update');
    Route::delete('/banques/{banque}', [App\Http\Controllers\BanqueController::class, 'destroy'])->name('banques.destroy');
    
    // Routes Partenaires
    Route::get('/partenaires', [App\Http\Controllers\PartenaireController::class, 'index'])->name('partenaires.index');
    Route::get('/partenaires/create', [App\Http\Controllers\PartenaireController::class, 'create'])->name('partenaires.create');
    Route::post('/partenaires', [App\Http\Controllers\PartenaireController::class, 'store'])->name('partenaires.store');
    Route::get('/partenaires/{partenaire}', [App\Http\Controllers\PartenaireController::class, 'show'])->name('partenaires.show');
    Route::get('/partenaires/{partenaire}/edit', [App\Http\Controllers\PartenaireController::class, 'edit'])->name('partenaires.edit');
    Route::put('/partenaires/{partenaire}', [App\Http\Controllers\PartenaireController::class, 'update'])->name('partenaires.update');
    Route::delete('/partenaires/{partenaire}', [App\Http\Controllers\PartenaireController::class, 'destroy'])->name('partenaires.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
