<?php

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

// Route::get('/naruto', function () {
//     return view('naruto');
// });

// Route::get('/zwe', function () {
//     return view('zwe');
// });

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Start Category
Route::get('/admin/category/list', [App\Http\Controllers\CategoryController::class, 'listCategory'])->name('category.list')->middleware('auth');
Route::post('/admin/category/add', [App\Http\Controllers\CategoryController::class, 'createCategory'])->name('category.create')->middleware('auth');
Route::get('/admin/category/del/{id}', [App\Http\Controllers\CategoryController::class, 'deleteCategory'])->name('category.delete')->middleware('auth');
Route::get('/admin/category/upd/{id}', [App\Http\Controllers\CategoryController::class, 'updCategory'])->name('category.upd')->middleware('auth');
Route::post('/admin/category/upd/{id}', [App\Http\Controllers\CategoryController::class, 'updateCategory'])->name('category.update')->middleware('auth');
// End Category

// Start Brand
Route::get('/admin/brand/list', [App\Http\Controllers\BrandController::class, 'listBrand'])->name('brand.list')->middleware('auth');
Route::post('/admin/brand/add', [App\Http\Controllers\BrandController::class, 'createBrand'])->name('brand.create')->middleware('auth');
Route::get('/admin/brand/del/{id}', [App\Http\Controllers\BrandController::class, 'deleteBrand'])->name('brand.delete')->middleware('auth');
Route::get('/admin/brand/upd/{id}', [App\Http\Controllers\BrandController::class, 'updBrand'])->name('brand.upd')->middleware('auth');
Route::post('/admin/brand/upd/{id}', [App\Http\Controllers\BrandController::class, 'updateBrand'])->name('brand.update')->middleware('auth');
// End Brand

// start Product
Route::get('/admin/product/list', [App\Http\Controllers\ProductController::class, 'listProduct'])->name('product.list')->middleware('auth');
Route::post('/admin/product/add', [App\Http\Controllers\ProductController::class, 'createProduct'])->name('product.create')->middleware('auth');
Route::get('/admin/product/del/{id}', [App\Http\Controllers\ProductController::class, 'deleteProduct'])->name('product.delete')->middleware('auth');
Route::get('/admin/product/upd/{id}', [App\Http\Controllers\ProductController::class, 'updProduct'])->name('product.upd')->middleware('auth');
Route::post('/admin/product/upd/{id}', [App\Http\Controllers\ProductController::class, 'updateProduct'])->name('product.update')->middleware('auth');
// end Product

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Category View
Route::get('/category/{id}/product/view', [App\Http\Controllers\FrontController::class, 'categoryView']);
//Category View

// Detail View
Route::get('/product/{id}/detail', [App\Http\Controllers\FrontController::class, 'detailView']);
// Detail View

//addToCartQty
Route::get('/product/addToCartQty/{id}',[App\Http\Controllers\FrontController::class, 'getAddToCartQty']);
//addToCartQty

//shoppingCart
Route::get('/product/shoppingCart',[App\Http\Controllers\FrontController::class, 'getCart']);
//shoppingCart

//Minus (-) shoppingCart
Route::get('/product/subToCart/{id}',[App\Http\Controllers\FrontController::class, 'getSubToCart']); 
//Minus (-) shoppingCart

//Plus (+) shoppingCart
Route::get('/product/addToCart/{id}',[App\Http\Controllers\FrontController::class, 'getAddToCart']); 
//Plus (+) shoppingCart

//Remove shoppingCart
Route::get('/product/removeFromCart/{id}',[App\Http\Controllers\FrontController::class, 'getRemoveFromCart']);
//Remove shoppingCart

//Clear shoppingCart
Route::get('/product/clearCart',[App\Http\Controllers\FrontController::class, 'getClearCart']);
//Clear shoppingCart

//Order
Route::get('/order',[App\Http\Controllers\FrontController::class, 'getOrder'])->middleware('auth');
//Order

//Payment
Route::get('/payment',[App\Http\Controllers\FrontController::class, 'getPayment']);
Route::post('/payment',[App\Http\Controllers\FrontController::class, 'createPayment']);
//Payment

// Start Order
Route::get('/admin/order/list', [App\Http\Controllers\OrderController::class, 'listOrder'])->name('order.list')->middleware('auth');
Route::get('/admin/order/del/{id}', [App\Http\Controllers\OrderController::class, 'deleteOrder'])->name('order.delete')->middleware('auth');
Route::get('/admin/order/upd/{id}', [App\Http\Controllers\OrderController::class, 'updOrder'])->name('order.upd')->middleware('auth');
Route::post('/admin/order/upd/{id}', [App\Http\Controllers\OrderController::class, 'updateOrder'])->name('order.update')->middleware('auth');
// Start Order

// Start OrderItem
Route::get('/admin/orderitem/list', [App\Http\Controllers\OrderitemController::class, 'listOrderitem'])->name('orderitem.list')->middleware('auth');
Route::get('/admin/orderitem/del/{id}', [App\Http\Controllers\OrderitemController::class, 'deleteOrderitem'])->name('orderitem.delete')->middleware('auth');
Route::get('/admin/orderitem/upd/{id}', [App\Http\Controllers\OrderitemController::class, 'updOrderitem'])->name('orderitem.upd')->middleware('auth');
Route::post('/admin/orderitem/upd/{id}', [App\Http\Controllers\OrderitemController::class, 'updateOrderitem'])->name('orderitem.update')->middleware('auth');
// Start OrderItem

// Start Payment
Route::get('/admin/payment/list', [App\Http\Controllers\PaymentController::class, 'listPayment'])->name('payment.list')->middleware('auth');
Route::get('/admin/payment/del/{id}', [App\Http\Controllers\PaymentController::class, 'deletePayment'])->name('payment.delete')->middleware('auth');
Route::get('/admin/payment/upd/{id}', [App\Http\Controllers\PaymentController::class, 'updPayment'])->name('payment.upd')->middleware('auth');
Route::post('/admin/payment/upd/{id}', [App\Http\Controllers\PaymentController::class, 'updatePayment'])->name('payment.update')->middleware('auth');
// Start Payment

// My Order
Route::get('/admin/myorder/list', [App\Http\Controllers\MyorderController::class, 'listMyorder'])->name('myorder.list')->middleware('auth');
Route::post('/admin/myorder/store',[App\Http\Controllers\MyorderController::class, 'store'])->middleware('auth');
// My Order

// MY Payment
Route::get('/admin/mypayment/list', [App\Http\Controllers\MypaymentController::class, 'listmypayment'])->name('mypayment.list')->middleware('auth');
// MY Payment