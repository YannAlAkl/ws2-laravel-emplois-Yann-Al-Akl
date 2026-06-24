<?php
use App\Http\Controllers\Admin\CandidatureController;
use App\Http\Controllers\Admin\OffreEmploiController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\EmploiController;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/emplois');

Route::view('/a-propos', 'apropos')->name('apropos');

Route::get('/emplois', [EmploiController::class, 'show'])
    ->name('emplois.index');

Route::get('/emplois/{offreEmploi}', [EmploiController::class, 'showEmploi'])
    ->name('emplois.show');

Route::get('/emplois/{offreEmploi}/postuler', [CandidatureController::class, 'postuler'])
    ->name('candidatures.create');

Route::post('/emplois/{offreEmploi}/postuler', [CandidatureController::class, 'soumettreCandidature'])
    ->name('candidatures.store');

Route::get('/admin/offres', [OffreEmploiController::class, 'index'])
    ->name('admin.offres.index');

Route::get('/admin/offres/create', [OffreEmploiController::class, 'create'])
    ->name('admin.offres.create');

Route::post('/admin/offres', [OffreEmploiController::class, 'store'])
    ->name('admin.offres.store');

Route::get('/admin/offres/{offreEmploi}/edit', [OffreEmploiController::class, 'edit'])
    ->name('admin.offres.edit');

Route::match(['put', 'patch'], '/admin/offres/{offreEmploi}', [OffreEmploiController::class, 'update'])
    ->name('admin.offres.update');

Route::delete('/admin/offres/{offreEmploi}', [OffreEmploiController::class, 'destroy'])
    ->name('admin.offres.destroy');

Route::get('/admin/offres/{offreEmploi}/candidatures', [OffreEmploiController::class, 'candidatures'])
    ->name('admin.offres.candidatures');

Route::get('/admin/candidatures/{candidature}/cv', [CandidatureController::class, 'cv'])
    ->name('admin.candidatures.cv');
// --- Authentification ---
Route::middleware('guest')->group(function () {
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
});

Route::post('/logout', [AuthController::class, 'logout'])
    ->middleware('auth')->name('logout');

// --- Vérification courriel ---
Route::middleware('auth')->group(function () {
    Route::get('/email/verify', [AuthController::class, 'verificationNotice'])
        ->name('verification.notice');
    Route::get('/email/verify/{id}/{hash}', [AuthController::class, 'verifierCourriel'])
        ->middleware('signed')->name('verification.verify');
    Route::post('/email/verification-notification', [AuthController::class, 'renvoyerLien'])
        ->middleware('throttle:6,1')->name('verification.send');
});



