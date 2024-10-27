<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ViewsController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Session;


//Home 
Route::get('/', [ViewsController::class,'Home']);

//Shop
Route::get('/Shop',[ViewsController::class,'Shop'])->name('Shop');
Route::get('/Shop-Category/{category}',[ViewsController::class,'ShopCategory'])->name('ShopCategory');

//ProductDetails
Route::get('product/details/{id}', [ViewsController::class,'productDetails'])->name('productDetails');

//Cart
Route::get('/cart' , [CartController::class, 'cart'])->name('cart');
Route::get('/NewCart' , [ViewsController::class, 'NewCart'])->name('NewCart');
Route::get('/CartForm' , [ViewsController::class, 'CartForm'])->name('CartForm');


Route::get('/cart/add/{id}/{size}' , [CartController::class, 'add'])->name('add');
Route::patch('update-cart', [CartController::class,'updatec']);
Route::delete('remove-from-cart', [CartController::class,'removec']);




//Auth
Auth::routes ();

//success

Route::post('/orders/store', [OrdersController::class ,'store'])->name('orders.store');

//Admin:
Route::get('/AdminSpace', [UserController::class,'AdminSpace'])->middleware('adminuser');

Route::middleware(['adminuser'])->group(function () {


Route::get('/product/edit/{id}', [UserController::class, 'edit'])->name('edit');
Route::put('/product/{id}', [UserController::class, 'update'])->name('update');


    Route::get('/orderstable', [OrdersController::class, 'index'])->name('admin.orderstable.index');
    Route::delete('/orders/{order}', [OrdersController::class, 'destroy'])->name('orders.destroy');
    Route::get('/orders/{order}/pdf', [OrdersController::class, 'generatePDF'])->name('orders.pdf');




    Route::get('/admin/add', [UserController::class, 'AddP'])->name('products.add');
    Route::post('/products', [UserController::class, 'store'])->name('products.store');
    Route::delete('/product/{id}', [UserController::class, 'destroy'])->name('destroy');
    Route::get('email', [UserController::class, 'email']);

    Route::post('/send/email', [UserController::class,'sendEmail'])->name('send.email');
    
});
//Client:
Route::get('/ClientSpace', [UserController::class,'ClientSpace'])->middleware('useruser');

Route::get('/catalogue', [UserController::class,'cataloguepdf'])->middleware('useruser');



//-------------------
Route::get('/clear-session', function () {
    Session::flush();
    return 'Session data cleared';
});

Auth::routes();

Route::get('/NewOrdersTable', [viewsController::class, 'NewOrdersTable'])->name('NewOrdersTable');