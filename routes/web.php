<?php

use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProviderController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\CustomerController;

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
/*
Route::get('/about', function () {
    return 'Acerca de nosotros';
});

Route::get('/user/{id}', function ($id) {
    return 'ID de usuario: ' . $id;
 });    


 Route::get('/contacto', function () {
    return 'Página de contacto';
})->name('contacto');

Route::get('/user/{id}', function ($id) {
    return 'ID de usuario: ' . $id;
})->where('id', '[0-9]{3}');


//Route::prefix('admin')->group(function () {
    Route::get('/', function () {
    return 'Panel de administración';
   });
    Route::get('/users', function () {
    return 'Lista de usuarios';
    });
}); 
*/
Route::group(['middleware' => ['auth']],function(){
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::resource('products', ProductController::class);
    Route::resource('providers', ProviderController::class);
    Route::resource('orders', SaleController::class);
    Route::resource('clients', CustomerController::class);
    //Route::get('/products', [App\Http\Controllers\ProductController::class, 'index'])->name('products');


});



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');