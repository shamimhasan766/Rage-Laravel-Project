<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SubcategoryController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard',[HomeController::class, 'Dashboard'])->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/dark/dashboard',[HomeController::class, 'Dark'])->middleware(['auth', 'verified'])->name('dark');
Route::get('/edit/profile', [UserController::class, 'EditProfile'])->middleware(['auth', 'verified'])->name('editprofile');
Route::post('/update/profile', [UserController::class, 'UpdateProfile'])->middleware(['auth', 'verified'])->name('updateprofile');
Route::post('/update/password', [UserController::class, 'UpdatePassword'])->middleware(['auth', 'verified'])->name('update.password');
Route::post('/update/photo', [UserController::class, 'UpdatePhoto'])->middleware(['auth', 'verified'])->name('update.photo');
Route::get('/user/list', [UserController::class, 'UserList'])->middleware(['auth', 'verified'])->name('user.list');
Route::get('/user/delete/{id}', [UserController::class, 'UserDelete'])->middleware(['auth', 'verified'])->name('user.delete');


// Category

Route::get('/category/all', [CategoryController::class, 'AllCategory'])->middleware(['auth', 'verified'])->name('all.category');
Route::get('/category/add', [CategoryController::class, 'AddCategory'])->middleware(['auth', 'verified'])->name('add.categories');
Route::post('/category/store', [CategoryController::class, 'CategoryStore'])->middleware(['auth', 'verified'])->name('store.category');
Route::get('/category/delete/{id}', [CategoryController::class, 'CategoryDelete'])->middleware(['auth', 'verified'])->name('category.delete');
Route::post('/category/edit/{id}', [CategoryController::class, 'CategoryEdit'])->middleware(['auth', 'verified'])->name('category.edit');
Route::get('/category/trash', [CategoryController::class, 'TrashCategory'])->middleware(['auth', 'verified'])->name('trash.category');
Route::get('/category/restore/{id}', [CategoryController::class, 'RestoreCategory'])->middleware(['auth', 'verified'])->name('restore.category');
Route::get('/category/force/delete/{id}', [CategoryController::class, 'CategoryForceDelete'])->middleware(['auth', 'verified'])->name('category.force.delete');
Route::post('/category/select/delete', [CategoryController::class, 'CategorySelectDelete'])->middleware(['auth', 'verified'])->name('category.select.delete');
Route::post('/category/select/from/trash', [CategoryController::class, 'CategorySelectTrash'])->middleware(['auth', 'verified'])->name('category.select.trash');




// Sub Category
Route::get('subcategory', [SubcategoryController::class , 'SubCategory'])->middleware(['auth', 'verified'])->name('all.sub.category');
Route::get('subcategory/new', [SubcategoryController::class , 'AddSubCategory'])->middleware(['auth', 'verified'])->name('new.category');








Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
