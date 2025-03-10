<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\OffreController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SocieteController;
use App\Http\Controllers\TagController;
use App\Http\Middleware\AuthMiddleware;
use App\Http\Middleware\SocieteMiddleware;
use App\Models\Tag;
use Illuminate\Support\Facades\Route;

// Lier le paramètre de route 'tag' au modèle Tag
Route::model('tag', Tag::class);

Route::get('/test', function () {
    $routes = Route::getRoutes();
    foreach ($routes as $route) {
        echo $route->getName() . '<br>';
    }
})->name('test');

Route::get('/tags', function () {
    return view('tags.tags');
})->name('tags');

Route::get('/editTag', function () {
    return view('tags.editTag');
})->name('editTag');

Route::get('/editRole', function () {
    return view('role.editRole');
})->name('editRole');

Route::get('/statistique', function () {
    return view('statistique');
})->name('statistique');

Route::get('/registre', function () {
    return view('registre');
})->name('registre');

Route::get('/dashboard/offre', function () {
    return view('/dashboard/offre');
})->name('dashboard.offre');

Route::get('/dashboard/reservation', function () {
    return view('/dashboard/reservation');
})->name('dashboard.reservation');

Route::get('/dashboard', [OffreController::class, 'index'])->name('dashboard')->middleware(AuthMiddleware::class);
Route::get('/offre/createOffre', [OffreController::class, 'create'])->name('offre.create')->middleware(AuthMiddleware::class);
Route::get('/offre/editOffre/{id}', [OffreController::class, 'edit'])->name('offre.edit');
Route::get('/deleteOffre/{id}', [OffreController::class, 'delete'])->name('delete');
Route::post('/updateOffre/{id}', [OffreController::class, 'update'])->name('update');
Route::post('/offre/createOffre', [OffreController::class, 'store'])->name('store');

Route::get('/registre', [AuthController::class, 'registre'])->name('registreForm');
Route::post('/registre', [AuthController::class, 'store'])->name('registre');

Route::get('/login', [AuthController::class, 'login'])->name('loginForm');
Route::post('/login', [AuthController::class, 'connecter'])->name('connecter');

Route::get('/formSociete', [SocieteController::class, 'create'])->name('formSociete')->middleware(SocieteMiddleware::class);
Route::post('/createSociete', [SocieteController::class, 'store'])->name('createSociete');

Route::get('/role', [RoleController::class, 'index'])->name('role');
Route::post('/addrole', [RoleController::class, 'store'])->name('addRole');
Route::get('/editRole/{role}', [RoleController::class, 'edit'])->name('editRole');
Route::post('/updateRole/{role}', [RoleController::class, 'update'])->name('roles.update');
Route::get('/deleteRole/{role}', [RoleController::class, 'destroy'])->name('deleteRole');

Route::get('/tags', [TagController::class, 'index'])->name('tags.index');
Route::post('/tags/add', [TagController::class, 'store'])->name('tags.store');
Route::get('/tags/edit/{tag}', [TagController::class, 'edit'])->name('tags.edit');
Route::post('/tags/{tag}', [TagController::class, 'update'])->name('tags.update');
Route::get('/tags/{tag}', [TagController::class, 'destroy'])->name('tags.destroy');
