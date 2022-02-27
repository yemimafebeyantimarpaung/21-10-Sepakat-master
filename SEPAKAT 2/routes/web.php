<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\VerifyEmailController;

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
Auth::routes(['verify' => true]);
Auth::routes();
Route::group(['middleware' => 'auth:web','verified'], function () {
    Route::get('/', function(){
        return redirect()->route('home');
    });
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', [App\Http\Controllers\BerandaController::class, 'index'])->name('beranda.index');
Route::get('/show/{id}', [App\Http\Controllers\BerandaController::class, 'show'])->name('beranda.show');
Route::get('/detail/{id}', [App\Http\Controllers\BerandaController::class, 'detail'])->name('beranda.detail');
Route::get('/modal/{id}', [App\Http\Controllers\ProductController::class, 'modal'])->name('products.modal');
Route::get('/create', [App\Http\Controllers\ProductController::class, 'create'])->name('tambah_produk');

});

Route::group(['middleware' => ['auth']], function() {
    Route::get('logout',[UserController::class,'do_logout'])->name('logout');
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
    Route::resource('products', ProductController::class);
});

Route::get('/verify','Auth\RegisterController@verifyUser')->name('verify.user');

Route::get('/email/verify/{id}/{hash}', [VerifyEmailController::class, '__invoke'])
    ->middleware(['signed', 'throttle:6,1'])
    ->name('verification.verify');

