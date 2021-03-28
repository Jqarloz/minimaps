<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShopController;


/* 
Route::get('/', function (){
    return view('welcome');
})->name('home');
 */

Route::get('/', [ShopController::class, 'index'])->name('shops.index');

Route::get('shops/{shop}', [ShopController::class, 'show'])->name('shops.show');

Route::get('shops/category/{category}', [ShopController::class, 'category'])->name('shops.category');

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