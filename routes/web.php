<?php

use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProviderController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\Sale_detailController;
use App\Models\Customer;


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
    Route::resource('customers', CustomerController::class);
    Route::get('changestatus_product', [ProductController::class, 'changestatus_product'])->name('changestatus_product');
    Route::get('changestatus_customer', [CustomerController::class, 'changestatus_customer'])->name('changestatus_customer');
    Route::resource('sales', SaleController::class);
    Route::get('changestatus_sale', [SaleController::class, 'changestatus_sale'])->name('changestatus_sale');
    Route::resource('sale_details', Sale_detailController::class);
    Route::get('changestatus_sale_detail', [Sale_detailController::class, 'changestatus_sale_detail'])->name('changestatus_sale_detail');
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