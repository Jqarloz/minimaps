<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\ShopController;
use App\Http\Controllers\Admin\TagController;
use Illuminate\Support\Facades\Route;


Route::resource('user', [UserController::class]);

Route::resource('categories', CategoryController::class)->names('admin.categories');

Route::resource('tags', TagController::class)->names('admin.tags');

Route::resource('shops', ShopController::class)->names('admin.shops');