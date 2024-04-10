<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfilController;
use  App\Http\Middleware\AdministrateurAuth;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

//API
    //Profil
    Route::prefix('profil')->group(function() {
        Route::get('/', [ProfilController::class,'getAll']);
        Route::middleware(AdministrateurAuth::class)->post('/', [ProfilController::class,'getAll']);
        Route::middleware(AdministrateurAuth::class)->put('/', [ProfilController::class,'create']);
        Route::middleware(AdministrateurAuth::class)->post('/{id}', [ProfilController::class,'update'])->whereNumber('id');
        Route::middleware(AdministrateurAuth::class)->delete('/{id}', [ProfilController::class,'delete']);
        //Commentaire
        Route::middleware(AdministrateurAuth::class)->post('/{id}/commentaire', [ProfilController::class,'addCommente'])->whereNumber('id');
    }
);