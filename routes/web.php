<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\OffreController;
use App\Http\Controllers\SocieteController;
use App\Http\Middleware\AuthMiddleware;
use App\Http\Middleware\SocieteMiddleware;
use Illuminate\Support\Facades\Route;

Route::get('/login', function () {
    return view('login');
});

Route::get('/hhh', function () {
    return view('hhh');
});

Route::get('/registre', function () {
    return view('registre');
});

Route::get('/dashboard/offre', function () {
    return view('/dashboard/offre');
})->name('dashboard.offre');

Route::get('/dashboard/reservation', function () {
    return view('/dashboard/reservation');
})->name('dashboard.reservation');





Route::get('/dashboard', [OffreController::class, 'index'])->middleware(AuthMiddleware::class);
Route::get('/offre/createOffre', [OffreController::class, 'create'])->name('offre.create')->middleware(AuthMiddleware::class);
Route::get('/offre/editOffre/{id}', [OffreController::class, 'edit'])->name('offre.edit');
Route::get('/deleteOffre/{id}', [OffreController::class, 'delete']);
Route::post('/updateOffre/{id}', [OffreController::class, 'update']);
Route::post('/offre/createOffre', [OffreController::class, 'store']);

Route::get('/registre', [AuthController::class, 'registre']);
Route::post('/registre', [AuthController::class, 'store'])->name('registre');

Route::get('/login', [AuthController::class, 'login']);
Route::post('/login', [AuthController::class, 'connecter'])->name('connecter');

Route::get('/formSociete', [SocieteController::class, 'create'])->middleware(SocieteMiddleware::class);
Route::post('/createSociete', [SocieteController::class, 'store'])->name('createSociete');
