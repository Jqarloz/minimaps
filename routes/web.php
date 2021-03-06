<?php

use App\Http\Controllers\ItemController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\ServiceController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShopController;


/* HOME */
Route::get('/', function (){
    return view('welcome');
})->name('home');

 /* Negocios */
Route::get('/shops', [ShopController::class, 'index'])->name('shops.index');
Route::get('shops/{shop}', [ShopController::class, 'show'])->name('shops.show');

/* Servicios */
Route::get('/services', [ServiceController::class, 'index'])->name('services.index');
Route::get('services/{service}', [ServiceController::class, 'show'])->name('services.show');

/* Tienda */
Route::get('/items', [ItemController::class, 'index'])->name('items.index');
Route::get('items/{item}', [ItemController::class, 'show'])->name('items.show');

/* Trabajos */
Route::get('/jobs', [JobController::class, 'index'])->name('jobs.index');
Route::get('jobs/{job}', [JobController::class, 'show'])->name('jobs.show');

/* Etiquetas */
Route::get('tags/{tag}', [ShopController::class, 'tag'])->name('shops.tag');


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('prueba', function () {
    return "Iniciando prueba...";
})->middleware(['auth:sanctum','age']);

Route::get('no-autorizado', function () {
    return "No mayor de edad";
});