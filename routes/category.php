<?php

use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;



Route::get('/add/category/', [CategoryController::class, 'AddCategory'])->middleware(['auth', 'verified'])->name('add.category');
