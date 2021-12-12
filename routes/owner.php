<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Owner\ShopController;

Route::redirect('', 'owner/shops');
Route::resource('shops', ShopController::class)->names('shops');
Route::get('shops/{shop}/location', [ShopController::class, 'locations'])->name('shops.location');
Route::get('shops/{shop}/social', [ShopController::class, 'social'])->name('shops.social');
Route::get('shops/{shop}/products', [ShopController::class, 'products'])->name('shops.products');