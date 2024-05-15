<?php

use App\Http\Controllers\BannerController;
use App\Http\Controllers\BrandsController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ChargeController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\CustomerAuthController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SslCommerzPaymentController;
use App\Http\Controllers\StripePaymentController;
use App\Http\Controllers\SubcategoryController;
use App\Http\Controllers\TagController;
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
// Frontend
Route::get('/', [FrontendController::class, 'Index'])->name('index');
Route::get('/product/details/{slug}', [FrontendController::class, 'ProductDetails'])->name('product.details');
Route::post('/get/size/', [FrontendController::class, 'GetSize'])->name('get.size');
Route::get('/category/product/{slug}', [FrontendController::class, 'CategoryProduct'])->name('category.product');
Route::get('/subcategory/product/{id}', [FrontendController::class, 'SubcategoryProduct'])->name('subcategory.product');
Route::get('/tag/product/{id}', [FrontendController::class, 'TagProduct'])->name('tag.product');
Route::get('/exciting/offer/{discount}', [FrontendController::class, 'ExcitingOffer'])->name('exciting.offer');
Route::get('/all/product', [FrontendController::class, 'AllProduct'])->name('all.product');
Route::post('/get/price/quantity', [FrontendController::class, 'GetQuantityPrice'])->name('get.quantity.price');
Route::get('/all/carts', [CartController::class, 'Cart'])->middleware('customer.auth')->name('cart');



// backend
Route::get('/dashboard',[HomeController::class, 'Dashboard'])->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/dark/dashboard',[HomeController::class, 'Dark'])->middleware(['auth', 'verified'])->name('dark');
Route::get('/edit/profile', [UserController::class, 'EditProfile'])->middleware(['auth', 'verified'])->name('editprofile');
Route::post('/update/profile', [UserController::class, 'UpdateProfile'])->middleware(['auth', 'verified'])->name('updateprofile');
Route::post('/update/password', [UserController::class, 'UpdatePassword'])->middleware(['auth', 'verified'])->name('update.password');
Route::post('/update/photo', [UserController::class, 'UpdatePhoto'])->middleware(['auth', 'verified'])->name('update.photo');
Route::get('/user/list', [UserController::class, 'UserList'])->middleware(['auth', 'verified'])->name('user.list');
Route::get('/user/delete/{id}', [UserController::class, 'UserDelete'])->middleware(['auth', 'verified'])->name('user.delete');
Route::get('/new/user', [UserController::class, 'NewUser'])->middleware(['auth', 'verified'])->name('new.user');
Route::post('/store/user', [UserController::class, 'StoreUser'])->middleware(['auth', 'verified'])->name('store.user');


// Category

Route::get('/category/all', [CategoryController::class, 'AllCategory'])->middleware(['auth', 'verified'])->name('all.category');
Route::get('/category/insert', [CategoryController::class, 'AddCategory'])->middleware(['auth', 'verified'])->name('add_category');
Route::post('/category/store', [CategoryController::class, 'CategoryStore'])->middleware(['auth', 'verified'])->name('store.category');
Route::get('/category/delete/{id}', [CategoryController::class, 'CategoryDelete'])->middleware(['auth', 'verified'])->name('category.delete');
Route::post('/category/edit/{id}', [CategoryController::class, 'CategoryEdit'])->middleware(['auth', 'verified'])->name('category.edit');
Route::get('/category/delete', [CategoryController::class, 'TrashCategory'])->middleware(['auth', 'verified'])->name('trash.category');
Route::get('/category/restore/{id}', [CategoryController::class, 'RestoreCategory'])->middleware(['auth', 'verified'])->name('restore.category');
Route::get('/category/force/delete/{id}', [CategoryController::class, 'CategoryForceDelete'])->middleware(['auth', 'verified'])->name('category.force.delete');
Route::post('/category/select/delete', [CategoryController::class, 'CategorySelectDelete'])->middleware(['auth', 'verified'])->name('category.select.delete');
Route::post('/category/select/from/trash', [CategoryController::class, 'CategorySelectTrash'])->middleware(['auth', 'verified'])->name('category.select.trash');




// Sub Category
Route::get('subcategory', [SubcategoryController::class , 'SubCategory'])->middleware(['auth', 'verified'])->name('all.sub.category');
Route::get('new', [SubcategoryController::class , 'AddSubCategory'])->middleware(['auth', 'verified'])->name('new.subcategory');
Route::post('subcategory/store', [SubcategoryController::class , 'StoreSubCategory'])->middleware(['auth', 'verified'])->name('store.subcategory');
Route::get('subcategory/delete/{id}', [SubcategoryController::class , 'DeleteSubCategory'])->middleware(['auth', 'verified'])->name('delete.subcategory');
Route::get('sub/cat/erase', [SubcategoryController::class, 'SubcategoryTrash'])->name('subcategory.trash');
Route::get('/subcategory/restore/{id}', [SubcategoryController::class, 'RestoreSubcategory'])->middleware(['auth', 'verified'])->name('restore.subcategory');
Route::get('/subcategory/force/delete/{id}', [SubcategoryController::class, 'SubcategoryForceDelete'])->middleware(['auth', 'verified'])->name('subcategory.force.delete');
Route::post('/subcategory/edit/{id}', [SubcategoryController::class, 'SubcategoryEdit'])->middleware(['auth', 'verified'])->name('subcategory.edit');
Route::post('/subcategory/select/from/trash', [SubcategoryController::class, 'SubcategorySelectTrash'])->middleware(['auth', 'verified'])->name('subcategory.select.trash');



// Brands
Route::get('brands', [BrandsController::class, 'Brands'])->name('brands');
Route::get('create', [BrandsController::class, 'AddBrand'])->name('add.brand');
Route::get('/bra', [BrandsController::class, 'BrandTrash'])->name('brand.trash');

Route::post('store/brand', [BrandsController::class, 'StoreBrand'])->name('store.brand');
Route::get('soft/delete/brand/{id}', [BrandsController::class, 'SoftDeleteBrand'])->name('soft.delete.brand');
Route::get('/brand/restore/{id}', [BrandsController::class, 'RestoreBrand'])->middleware(['auth', 'verified'])->name('restore.brand');
Route::get('/brand/force/delete/{id}', [BrandsController::class, 'BrandForceDelete'])->middleware(['auth', 'verified'])->name('brand.force.delete');
Route::post('/brand/edit/{id}', [BrandsController::class, 'BrandEdit'])->middleware(['auth', 'verified'])->name('brand.edit');


// Tags
Route::get('tags', [TagController::class, 'Tags'])->middleware('auth', 'verified')->name('tags');
Route::post('tag/store', [TagController::class, 'TagStore'])->middleware('auth', 'verified')->name('tag.store');
Route::get('tag/delete/{id}', [TagController::class, 'TagDelete'])->middleware('auth', 'verified')->name('tag.delete');
Route::post('tag/edit/{id}', [TagController::class, 'TagEdit'])->middleware('auth', 'verified')->name('tag.edit');
Route::get('wipe', [TagController::class, 'TagTrash'])->middleware('auth', 'verified')->name('tags.trash');
Route::get('tag/restore/{id}', [TagController::class, 'RestoreTag'])->middleware('auth', 'verified')->name('restore.tag');
Route::get('tag/delete/permanent/{id}', [TagController::class, 'DeleteTagPermanent'])->middleware('auth', 'verified')->name('tag.delete.permanent');



// Products
Route::get('join', [ProductController::class, 'AddProduct'])->middleware('auth', 'verified')->name('add.product');
Route::post('get/subcategory', [ProductController::class, 'GetSubcategory'])->middleware('auth', 'verified')->name('get.subcategory');
Route::post('store/product', [ProductController::class, 'ProductStore'])->middleware('auth', 'verified')->name('product.store');
Route::get('products', [ProductController::class, 'AllProduct'])->middleware('auth', 'verified')->name('products');
Route::get('product/view/{id}', [ProductController::class, 'ViewProduct'])->middleware('auth', 'verified')->name('view.product');
Route::get('product/delete/{id}', [ProductController::class, 'DeleteProduct'])->middleware('auth', 'verified')->name('delete.product');
Route::get('product/edit/{id}', [ProductController::class, 'EditProduct'])->middleware('auth', 'verified')->name('edit.product');
Route::post('update/product', [ProductController::class, 'ProductUpdate'])->middleware('auth', 'verified')->name('update.product');
Route::get('gallery/image/delete/{id}', [ProductController::class, 'GalleryImageDelete'])->middleware('auth', 'verified')->name('gallery.image.delete');
Route::get('change/status/{id}', [ProductController::class, 'Changestatus'])->middleware('auth', 'verified')->name('product.status');

// Inventory
Route::get('add/color', [InventoryController::class, 'AddColor'])->middleware('auth', 'verified')->name('add.color');
Route::post('store/color', [InventoryController::class, 'ColorStore'])->middleware('auth', 'verified')->name('color.store');
Route::get('add/size', [InventoryController::class, 'AddSize'])->middleware('auth', 'verified')->name('size');
Route::post('store/size', [InventoryController::class, 'SizeStore'])->middleware('auth', 'verified')->name('size.store');
Route::get('inventory/{id}', [InventoryController::class, 'Inventory'])->middleware('auth', 'verified')->name('inventory');
Route::post('inventory/store/{id}', [InventoryController::class, 'InventoryStore'])->middleware('auth', 'verified')->name('inventory.store');
Route::get('delete/inventory/{id}', [InventoryController::class, 'InventoryDelete'])->middleware('auth', 'verified')->name('delete.inventory');

// Banner
Route::get('banner', [BannerController::class, 'Banner'] )->middleware('auth', 'verified')->name('banner');
Route::post('banner/store', [BannerController::class, 'BannerStore'] )->middleware('auth', 'verified')->name('banner.store');
Route::get('banner/status/{id}', [BannerController::class, 'BannerStatus'] )->middleware('auth', 'verified')->name('banner.status');
Route::get('banner/delete/{id}', [BannerController::class, 'BannerDelete'] )->middleware('auth', 'verified')->name('banner.delete');
Route::get('existing/offer', [BannerController::class, 'ExistingOffer'] )->middleware('auth', 'verified')->name('existing.offer');

// Customer Authentication
Route::get('customer/login', [CustomerAuthController::class, 'CustomerLogin'])->name('customer.login');
Route::get('customer/register', [CustomerAuthController::class, 'CustomerRegister'])->name('customer.register');
Route::post('customer/store', [CustomerAuthController::class, 'CustomerStore'])->name('customer.store');
Route::post('customer/login/check', [CustomerAuthController::class, 'CustomerLoginCheck'])->name('customer.login.check');
Route::get('customer/logout', [CustomerAuthController::class, 'CustomerLogout'])->name('customer.logout');

// Customer
Route::get('customer/profile', [CustomerController::class, 'CustomerProfile'])->middleware('customer.auth')->name('customer.profile');
Route::post('customer/account/details', [CustomerController::class, 'CustomerAccountDetails'])->middleware('customer.auth')->name('customer.account.details');
Route::post('customer/password/update', [CustomerController::class, 'CustomerPasswordUpdate'])->middleware('customer.auth')->name('customer.password.update');
Route::post('customer/get/city', [CustomerController::class, 'CustomerGetCity'])->middleware('customer.auth')->name('customer.get.city');
Route::post('customer/update/address', [CustomerController::class, 'CustomerUpdateAddress'])->middleware('customer.auth')->name('customer.update.address');
Route::get('download/invoice/{id}', [CustomerController::class, 'DownloadInvoice'])->middleware('customer.auth')->name('download.invoice');
Route::get('cancel/order/request/{order_id}', [CustomerController::class, 'CancelOrderRequest'])->middleware('customer.auth')->name('cancel.request');
Route::post('cancel/order/request/store', [CustomerController::class, 'CancelOrderRequestStore'])->middleware('customer.auth')->name('cancel.request.store');


// Cart
Route::post('add/to/cart/{slug}', [CartController::class, 'AddToCart'])->middleware('customer.auth')->name('add.to.cart');
Route::get('cart/remove/{id}', [CartController::class, 'CartRemove'])->middleware('customer.auth')->name('cart.remove');
Route::post('cart/update/', [CartController::class, 'CartUpdate'])->middleware('customer.auth')->name('cart.update');


// Coupon
Route::get('all/coupon', [CouponController::class, 'AllCoupon'])->middleware('auth', 'verified')->name('all.coupon');
Route::get('add/coupon', [CouponController::class, 'AddCoupon'])->middleware('auth', 'verified')->name('add.coupon');
Route::get('trash/coupon', [CouponController::class, 'TrashCoupon'])->middleware('auth', 'verified')->name('trash.coupon');
Route::post('store/coupon', [CouponController::class, 'StoreCoupon'])->middleware('auth', 'verified')->name('store.coupon');

// Checkout
Route::get('checkout', [CheckoutController::class, 'Checkout'])->middleware('customer.auth')->name('checkout');
Route::post('add/address', [CheckoutController::class, 'AddAddress'])->middleware('customer.auth')->name('add.address');
Route::post('store/order', [CheckoutController::class, 'StoreOrder'])->middleware('customer.auth')->name('store.order');
Route::get('delete/shipping/address/{id}', [CheckoutController::class, 'DeleteShippingAddress'])->middleware('customer.auth')->name('delete.shipping.address');
Route::get('invoice/testing', [CheckoutController::class, 'InvoiceTesting'])->middleware('customer.auth')->name('invoice.testing');
Route::get('order/success', [CheckoutController::class, 'OrderSuccess'])->name('order.success');


// Delevery Charge
Route::get('charge', [ChargeController::class, 'Charge'])->middleware('auth', 'verified')->name('charge');
Route::post('store/charge', [ChargeController::class, 'StoreCharge'])->middleware('auth', 'verified')->name('store.charge');
Route::get('delete/charge/{id}', [ChargeController::class, 'DeleteCharge'])->middleware('auth', 'verified')->name('delete.charge');
Route::post('get/charge', [ChargeController::class, 'GetCharge'])->middleware('auth', 'verified')->name('get.charge');

// Order
Route::get('all/orders', [OrderController::class, 'Orders'])->middleware('auth', 'verified')->name('orders');
Route::post('status/update/update/{id}', [OrderController::class, 'StatusUpdate'])->middleware('auth', 'verified')->name('status.update');
Route::get('cancel/requests', [OrderController::class, 'CancelRequests'])->middleware('auth', 'verified')->name('cancel.requests');
Route::get('cancelled/order', [OrderController::class, 'CancelledOrder'])->middleware('auth', 'verified')->name('cancelled.order');
Route::get('declined/requests', [OrderController::class, 'DeclinedRequests'])->middleware('auth', 'verified')->name('declined.requests');
Route::post('update/cancel/request/{id}', [OrderController::class, 'UpdateCancelRequests'])->middleware('auth', 'verified')->name('update.cancel.requests');


// SSLCOMMERZ Start
Route::get('/pay', [SslCommerzPaymentController::class, 'index']);
Route::post('/pay-via-ajax', [SslCommerzPaymentController::class, 'payViaAjax']);

Route::post('/success', [SslCommerzPaymentController::class, 'success']);
Route::post('/fail', [SslCommerzPaymentController::class, 'fail']);
Route::post('/cancel', [SslCommerzPaymentController::class, 'cancel']);

Route::post('/ipn', [SslCommerzPaymentController::class, 'ipn']);
//SSLCOMMERZ END


// Stripe
Route::controller(StripePaymentController::class)->group(function(){
    Route::get('stripe', 'stripe')->name('stripe.pay');
    Route::post('stripe', 'stripePost')->name('stripe.post');
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
