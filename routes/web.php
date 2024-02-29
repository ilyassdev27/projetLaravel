<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\App;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\Admin\CategoryController;


Route::get('/', [StoreController::class ,'index']);
Route::get('/produits/{cat}', [StoreController::class,'getProdByCat']) ;
//Route::get('/catalogue', [StoreController::class,'cataloguepdf']);
Route::get('/catalogue', [PDFController::class, 'generateDiscountedPricesPDF']);


Route::middleware(['adminuser'])->group(function () {
  // Route::get('/products/{id}', [ProductController::class,'show'])->name('show');
  Route::get('/products/{id}/edit', [ProductController::class,'edit'])->name('edit');
  Route::get('/products/create', [ProductController::class,'create'])->name('create');    //    Appel : <a href="{{ route('name') }}">
  Route::post('/products', [ProductController::class,'store'])->name('store');
  Route::put('/products/{id}', [ProductController::class,'update'])->name('update');
  Route::delete('/products/{id}', [ProductController::class,'destroy'])->name('destroy');
 Route::get('/products', [ProduitController::class,'index'])->middleware('adminuser');
 Route::get('/products', [ProductController::class,'index'])->name('index');

});

//Route::resource('products', ProductController::class);
Route::resource('categories', CategoryController::class);
//Route::resource('/showMore', CategoryController::class);

Route::get('/espaceclient', [StoreController::class,'espaceclient']);
//Route::get('/espaceadmin', [StoreController::class,'espaceadmin']);


/////////////Midlleware Group//////
// Route::group(['middleware' => 'adminuser'], function() {
//     Route::get('/product/form','ProductController@create');
//     Route::get('/product/edit','ProductController@edit');
//      Route::delete('/computers','ProductController@destroy');

//   });


////// cart
Route::get('cart', [ProductController::class,'cart']);

Route::get('cart/addc/{id}', [ProductController::class,'addToCart']);


Route::patch('update-cart', [ProductController::class,'updatec']);

Route::delete('remove-from-cart', [ProductController::class,'removec']);


 Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
  //Authentication Routes...
 Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
 Route::post('login', 'Auth\LoginController@login');
 Route::post('logout', 'Auth\LoginController@logout')->name('logout');

 // Registration Routes...
 Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
 Route::post('register', 'Auth\RegisterController@register');

  //Password Reset Routes...
  Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
  Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
  Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
  Route::post('password/reset', 'Auth\ResetPasswordController@reset');
//Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/email',[CategoryController::class,'email']);
Route::get('/send/email',[CategoryController::class,'sendEmail'])->name('send.email');
