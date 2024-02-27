<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\UserController;

Route::get('/', [ PageController::class, 'index' ])->name('page.index');

Route::get('/dashboard', [ UserController::class, 'index' ])->name('dash.index');


