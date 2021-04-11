<?php

use App\Http\Controllers\ServiceController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShopController;


/* 
Route::get('/', function (){
    return view('welcome');
})->name('home');
 */

Route::get('/', [ShopController::class, 'index'])->name('shops.index');

Route::get('shops/{shop}', [ShopController::class, 'show'])->name('shops.show');

Route::get('/services', [ServiceController::class, 'index'])->name('services.index');

Route::get('services/{service}', [ServiceController::class, 'show'])->name('services.show');

Route::get('/items', [ServiceController::class, 'index'])->name('items.index');

Route::get('items/{item}', [ServiceController::class, 'show'])->name('items.show');

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