<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HeaderController;

Route::get('/', [ PageController::class, 'index' ])->name('page.index');

Route::get('/dashboard', [ UserController::class, 'index' ])->name('user.index');
Route::get('/dashboard/add-user', [ UserController::class, 'create' ])->name('user.create');
Route::post('/dashboard/add-user', [ UserController::class, 'store' ])->name('user.store');
Route::get('/dashboard/update-user/{id}', [ UserController::class, 'edit' ])->name('user.edit');
Route::put('/dashboard/update-user/{id}', [ UserController::class, 'update' ])->name('user.update');
Route::delete('/dashboard/delete-user/{id}', [ UserController::class, 'destroy' ])->name('user.destroy');

Route::get('/dashboard/header-section', [ HeaderController::class, 'index' ])->name('header.index');
Route::get('/dashboard/header-section/create-content', [ HeaderController::class, 'create' ])->name('header.create');
Route::post('/dashboard/header-section/create-content', [ HeaderController::class, 'store' ])->name('header.store');
Route::post('/dashboard/header-section/update-published/{id}', [ HeaderController::class, 'updatePublished' ])->name('header.updatePublished');

