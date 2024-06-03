<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ViewsController;
use App\Http\Controllers\ActionsController;

Route::get('/', [ViewsController::class,'index']);

Route::get('/register', [ViewsController::class,'register'])
    -> name('site.register')
    -> middleware('guest');

Route::post('/register', [ActionsController::class,'register'])
    -> middleware('guest');

Route::get('/exit', [ActionsController::class,'logout'])
    ->name('site.logout')
    ->middleware('auth');

Route::get('/login', [ViewsController::class,'login'])
    ->name('site.login')
    ->middleware('guest');

Route::post('/login', [ActionsController::class,'login'])
    ->middleware('guest');

Route::get('/item/create', [ViewsController::class,'create_item'])
    ->name('item.create')
    ->middleware('auth');

Route::post('/item/create', [ActionsController::class,'create_item']);

    