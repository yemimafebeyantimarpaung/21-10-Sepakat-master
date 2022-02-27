<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\wishlistController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('wishlist', [WishListController::class, 'index']);
Route::post('wishlist', [WishListController::class, 'store']);
Route::put('/wishlist/{id}', [WishListController::class, 'update']);
Route::delete('/wishlist/{id}', [WishListController::class, 'destroy']);
