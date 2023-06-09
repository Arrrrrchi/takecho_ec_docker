<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\GuestController;
use Illuminate\Support\Facades\Route;

Route::get('/', [GuestController::class, 'index'])->name('guest.index');

Route::get('/items', [ItemController::class, 'index'])->name('items.index');
Route::get('/show/{item}', [ItemController::class, 'show'])->name('items.show');

Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');
Route::post('/contact/confirm', [ContactController::class, 'confirm'])->name('contact.confirm');
Route::post('/contact/thanks', [ContactController::class, 'send'])->name('contact.send');