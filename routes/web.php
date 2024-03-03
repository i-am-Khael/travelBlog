<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HeaderController;
use App\Http\Controllers\ArticleController;

Route::get('/', [ PageController::class, 'index' ])->name('page.index');
Route::get('login', [ PageController::class, 'loginPage' ])->name('login');
Route::post('login', [ AUthController::class, 'authUser' ])->name('auth.login');


Route::prefix('dashboard')
->middleware('auth')
->group(function(){

    Route::get('/', [ UserController::class, 'index' ])->name('user.index');
    Route::get('add-user', [ UserController::class, 'create' ])->name('user.create');
    Route::post('add-user', [ UserController::class, 'store' ])->name('user.store');
    Route::get('update-user/{id}', [ UserController::class, 'edit' ])->name('user.edit');
    Route::put('update-user/{id}', [ UserController::class, 'update' ])->name('user.update');
    Route::delete('delete-user/{id}', [ UserController::class, 'destroy' ])->name('user.destroy');

    Route::get('header-section', [ HeaderController::class, 'index' ])->name('header.index');
    Route::get('header-section/create-content', [ HeaderController::class, 'create' ])->name('header.create');
    Route::post('header-section/create-content', [ HeaderController::class, 'store' ])->name('header.store');
    Route::get('header-section/update/{id}', [ HeaderController::class, 'edit' ])->name('header.edit');
    Route::put('header-section/update/{id}', [ HeaderController::class, 'update' ])->name('header.update');
    Route::post('header-section/update-published/{id}', [ HeaderController::class, 'updatePublished' ])->name('header.updatePublished');
    Route::delete('header-section/delete-content/{id}', [ HeaderController::class, 'destroy' ])->name('header.delete');

    Route::get('articles', [ ArticleController::class, 'index' ])->name('article.index');
    Route::get('articles/create', [ ArticleController::class, 'create' ])->name('article.create');
    Route::post('articles/create', [ ArticleController::class, 'store' ])->name('article.store');
    Route::get('articles/edit/{id}', [ ArticleController::class, 'edit' ])->name('article.edit');
    Route::put('articles/edit/{id}', [ ArticleController::class, 'update' ])->name('article.update');
    Route::delete('articles/delete/{id}', [ ArticleController::class, 'destroy' ])->name('article.delete');


});


