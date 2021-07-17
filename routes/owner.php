<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Owner\ShopController;
use App\Http\Livewire\Owner\Shops\ShopLocation;

Route::redirect('', 'owner/shops');
Route::resource('shops', ShopController::class)->names('shops');
Route::get('shops/{shop}/location', ShopLocation::class)->name('shops.location');