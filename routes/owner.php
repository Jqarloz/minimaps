<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Owner\ShopController;

Route::redirect('', 'owner/shops');
Route::resource('shops', ShopController::class)->names('shops');