<?php

use App\Http\Controllers\AdminConsignController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminProductsController;
use App\Http\Controllers\BlogsController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ConsignController;
use App\Http\Controllers\Order_managementController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductReview;
use App\Http\Controllers\VNPAYController;
use App\Http\Controllers\WishlistController;
use App\Http\Controllers\HomeController;

use App\Models\Wishlist;


Route::get('/', [HomeController::class, 'index'])->name('home');


// ====================== Admin ======================
Route::prefix('admin')->middleware(['auth', 'isAdmin'])->group(function () {
    Route::get('/home', [AdminController::class, 'adminHome'])->name('admin.home');

    // Consign Management
    Route::get("/consign", [AdminConsignController::class, 'index'])->name("admin.consign.index");
    Route::get('/consign/show/{id}', [AdminConsignController::class, 'show'])->name('admin.consign.show');
    Route::put('/consign/update/{id}', [AdminConsignController::class, 'update'])->name('admin.consign.update');
    Route::delete('/consign/delete/{id}', [AdminConsignController::class, 'delete'])->name('admin.consign.delete');

    // Product Management
    Route::get('/product-management', [AdminProductsController::class, 'adminShowAllProducts'])->name('admin.products.index');
    Route::get('/product-management/create', [AdminProductsController::class, 'adminCreateProduct'])->name('admin.products.create');
    Route::post('/product-management/store', [AdminProductsController::class, 'adminStoreProduct'])->name('admin.products.store');
    Route::get('/product-management/{id}', [AdminProductsController::class, 'adminDetailProduct'])->name('admin.product.show');
    Route::get('/product-management/edit/{id}', [AdminProductsController::class, 'adminEditProduct'])->name('admin.product.edit');
    Route::put('/product-management/update/{id}', [AdminProductsController::class, 'adminUpdateProduct'])->name('admin.product.update');
    Route::delete('/product-management/delete/{id}', [AdminProductsController::class, 'adminDeleteProduct'])->name('admin.product.delete');

    // ================order-management ================
    Route::get('/order_management', [Order_managementController::class, 'index'])->name('admin.order_management.index');
    Route::get('/order_management/order_detail/{invoice_id}', [Order_managementController::class, 'adminOrderDetail'])->name('admin.order_management.order_detail');
    Route::get('/order_management/Cancelation', [Order_managementController::class, 'adminOrderCancelation'])->name('admin.order_management.Cancelation');
    Route::get('/order_management/Return', [Order_managementController::class, 'adminOrderReturn'])->name('admin.order_management.Return');
    Route::put('/order_management/update/{id}', [Order_managementController::class, 'update'])->name('admin.order_management.update');
});

// ====================== Product ======================
Route::resource('products', ProductsController::class);
Route::get('products/category/{id}', [ProductsController::class, 'filterWithCategory'])->name('products.filter-category');
Route::get('/products/search', [ProductsController::class, 'search'])->name('products.search');
// ====================== Consign ======================
Route::get('/consign', [ConsignController::class, 'create'])->name('consign.create');
Route::post('consign/store', [ConsignController::class, 'store'])->name('consign.store');
Route::delete('consign/delete/{id}', [ConsignController::class, 'delete'])->name('consign.delete');

// ====================== Blog ======================
Route::get('/blogs', [BlogsController::class, 'index'])->name('blogs.index');
Route::get('blogs/show', [BlogsController::class, 'show'])->name('blogs.show');


// ====================== User ======================
Route::prefix('user')->group(function () {
    Route::get('/info', [UserController::class, 'index'])->name('user.info');
    Route::get('/purchase', [UserController::class, 'index'])->name('user.purchase');
    Route::get('/address', [UserController::class, 'indexAddress'])->name('user.address.index');
    Route::get('/address/create', [UserController::class, 'addAddress'])->name('user.address.create');
    Route::post('/address/store', [UserController::class, 'storeAddress'])->name('user.address.store');
    Route::get('/address/edit/{id}', [UserController::class, 'editAddress'])->name('user.address.edit');
    Route::put('/address/update/{id}', [UserController::class, 'updateAddress'])->name('user.address.update');
    Route::delete('/address/delete/{id}', [UserController::class, 'deleteAddress'])->name('user.address.delete');
    Route::get('/edit/{id}', [UserController::class, 'editUser'])->name('user.edit');
    Route::put('/edit/{id}', [UserController::class, 'updateUser'])->name('user.update');
});

Route::get('/user/purchase', [UserController::class, 'indexPurch'])->name('user.purchase');

// ====================== Cart ======================
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::get('/cart/delete/{cart_detail_id}', [CartController::class, 'delete'])->name('cart.delete');
// Route::post('/cart/update-is-choose/{cart_detail_id}', [CartController::class, 'updateIsChoose'])->name('cart.updateIsChoose');
// Route::get('/cart/deleteSelected/{cart_detail_id}', [CartController::class,'deleteSelected'])->name('deleteSelected');
Route::post('/cart/delete-selected', [CartController::class, 'deleteSelected'])->name('cart.deleteSelected');
Route::post('/cart/update-selected', [CartController::class, 'updateSelected'])->name('cart.updateSelected');
Route::post('/cart/add', [CartController::class, 'addToCart'])->name('cart.add');
Route::post('/cart/addDetail', [CartController::class, 'addToCart_detail'])->name('cart.addDetail');

// ====================== Checkout ======================
Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');
Route::get('checkout/{invoice_id}', [CheckoutController::class, 'index2'])->name('checkout.index2');
Route::post('/checkout/updateOrder', [CheckoutController::class, 'updateOrder'])->name('checkout.updateOrder');

// ====================== Wishlist ======================
Route::get('/wishlist', [WishlistController::class, 'index'])->name('wishlist.index');
Route::post('/wishlist/store/{id}', [WishlistController::class, 'store'])->name('wishlist.store');
Route::delete('/wishlist/delete/{id}', [WishlistController::class, 'delete'])->name('wishlist.delete');



Route::get('/admin/product-management/rate', function () {
    return view('./admin/product-management/rate');
});

Route::get('/admin/finance/revenue_unpaid', function () {
    return view('./admin/finance/revenue_unpaid');
});
Route::get('/admin/finance/revenue_paid', function () {
    return view('./admin/finance/revenue_paid');
});
Route::get('/admin/finance/sale_analysis', function () {
    return view('./admin/finance/sale_analysis');
});

Route::get('/user/bank', function () {
    return view('user.bank');
})->name('user.bank');




Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('auth/google', [App\Http\Controllers\GoogleAuthController::class, 'redirect'])->name('google-auth');
Route::get('auth/google/callback', [App\Http\Controllers\GoogleAuthController::class, 'callBackGoogle']);
Route::get('auth/facebook', [App\Http\Controllers\FaceBookAuthController::class, 'redirect'])->name('facebook-auth');
Route::get('auth/facebook/callback', [App\Http\Controllers\FaceBookAuthController::class, 'callBackFacebook']);
Route::get('/test', [App\Http\Controllers\UserController::class, 'indexPurch']);

Route::post('/api/rate-product/{id}', [ProductReview::class, 'store']);

Route::post('/vnpay_payment', [VNPAYController::class, 'vnpay_payment'])->name('vnpay.payment');
