<?php

use App\Http\Controllers\BrandsController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SubcategoryController;
use App\Http\Controllers\UserController;
use App\Models\Subcategory;
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
Route::post('subcategory/store', [SubcategoryController::class , 'StoreSubCategory'])->middleware(['auth', 'verified'])->name('store.subcategory');
Route::get('subcategory/delete/{id}', [SubcategoryController::class , 'DeleteSubCategory'])->middleware(['auth', 'verified'])->name('delete.subcategory');
Route::get('subcategory/trash', [SubcategoryController::class, 'SubcategoryTrash'])->name('subcategory.trash');
Route::get('/subcategory/restore/{id}', [SubcategoryController::class, 'RestoreSubcategory'])->middleware(['auth', 'verified'])->name('restore.subcategory');
Route::get('/subcategory/force/delete/{id}', [SubcategoryController::class, 'SubcategoryForceDelete'])->middleware(['auth', 'verified'])->name('subcategory.force.delete');
Route::post('/subcategory/edit/{id}', [SubcategoryController::class, 'SubcategoryEdit'])->middleware(['auth', 'verified'])->name('subcategory.edit');



// Brands
Route::get('brands', [BrandsController::class, 'Brands'])->name('brands');
Route::get('add/brand', [BrandsController::class, 'AddBrand'])->name('add.brand');
Route::get('brand/trash', [BrandsController::class, 'BrandTrash'])->name('brand.trash');

Route::post('store/brand', [BrandsController::class, 'StoreBrand'])->name('store.brand');
Route::get('soft/delete/brand/{id}', [BrandsController::class, 'SoftDeleteBrand'])->name('soft.delete.brand');
Route::get('/brand/restore/{id}', [BrandsController::class, 'RestoreBrand'])->middleware(['auth', 'verified'])->name('restore.brand');
Route::get('/brand/force/delete/{id}', [BrandsController::class, 'BrandForceDelete'])->middleware(['auth', 'verified'])->name('brand.force.delete');




Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
