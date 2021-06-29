<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Owner\OwnerShops;

Route::redirect('', 'owner/shops');
Route::get('shops', OwnerShops::class)->name('shops.index');