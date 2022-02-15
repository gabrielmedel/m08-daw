<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */

Route::get('/', function () {
    return view('welcome');
});

// Pas 2. LListat de tots els planetes
Route::get('/planets', [App\Http\Controllers\PlanetController::class, 'index'])->name('planets.index');

// Pas 3. Obtenir dades d'un planeta en concret
Route::get('/planets/show/{id}', [App\Http\Controllers\PlanetController::class, 'show'])->name('planets.show');

Route::get('/planets/create', [App\Http\Controllers\PlanetController::class, 'create'])->name('planets.create');

Route::post('/planets/store', [App\Http\Controllers\PlanetController::class, 'store'])->name('planets.store');

Route::get('/planets/destroy/{id}', [App\Http\Controllers\PlanetController::class, 'destroy'])->name('planets.destroy');

Route::get('/planets/edit/{id}', [App\Http\Controllers\PlanetController::class, 'edit'])->name('planets.edit');

Route::post('/planets/update/{id}', [App\Http\Controllers\PlanetController::class, 'update'])->name('planets.update');
