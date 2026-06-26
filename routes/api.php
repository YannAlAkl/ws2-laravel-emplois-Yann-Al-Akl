<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\OffreEmploiController;

Route::middleware('auth:api')->group(function () {
    Route::get('/offres', [OffreEmploiController::class, 'index']);
    Route::get('/offres/{offreEmploi}', [OffreEmploiController::class, 'show']);
});
