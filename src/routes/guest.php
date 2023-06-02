<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ItemController;
use Illuminate\Support\Facades\Route;


Route::get('/items', [ItemController::class, 'index'])->name('items.index');
Route::get('/show/{item}', [ItemController::class, 'show'])->name('items.show');
