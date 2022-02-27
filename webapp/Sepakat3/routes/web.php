<?php

use App\Http\Controllers\BerandaController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserAucationController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WishlistController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::group(['middleware' => 'auth:web','verified'], function () {
    Route::get('/', function(){
        return redirect()->route('home');
    });

    Route::get('/', [BerandaController::class, 'index'])->name('beranda.index');
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/show/{id}', [BerandaController::class, 'show'])->name('beranda.show');
    Route::get('/detail/{id}', [BerandaController::class, 'detail'])->name('beranda.detail');
    Route::get('/modal/{id}', [App\Http\Controllers\ProductController::class, 'modal'])->name('products.modal');
    Route::get('/create', [App\Http\Controllers\ProductController::class, 'create'])->name('tambah_produk');

    Route::get('/wishlist', [WishlistController::class, 'index'])->name('wishlist');
    Route::post('/aucation/join', [UserAucationController::class, 'postJoin'])->name('aucation/join');

    Route::post('search', [BerandaController::class, 'postSearch'])->name('search');
    Route::get('/search/{search}', [BerandaController::class, 'index'])->name('search/{search}');
});

Route::group(['middleware' => ['auth']], function() {
    Route::get('logout',[UserController::class,'do_logout'])->name('logout');
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
    Route::resource('products', ProductController::class);
});

