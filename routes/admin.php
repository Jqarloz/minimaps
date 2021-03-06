<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\MiMapa\ItemController;
use App\Http\Controllers\Admin\MiMapa\JobController;
use App\Http\Controllers\Admin\MiMapa\ServiceController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\ShopController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\RoleController;

Route::get('', [HomeController::class, 'index'])->middleware('can:admin.home')->name('admin.home');

Route::resource('users', UserController::class)->only(['index','edit','update','destroy'])->names('admin.users');

Route::resource('roles', RoleController::class)->except('show')->names('admin.roles');

Route::resource('permissions', PermissionController::class)->except('show')->names('admin.permissions');

Route::resource('categories', CategoryController::class)->except('show')->names('admin.categories');

Route::resource('tags', TagController::class)->except('show')->names('admin.tags');

Route::resource('shops', ShopController::class)->except('show')->names('admin.shops');

/* Servicios */
Route::resource('services', ServiceController::class)->except('show')->names('admin.services');

/* Items */
Route::resource('items', ItemController::class)->except('show')->names('admin.items');

/* Jobs */
Route::resource('jobs', JobController::class)->except('show')->names('admin.jobs');
