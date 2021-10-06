<?php

use App\Http\Controllers\API\CheckoutController;
use App\Http\Controllers\API\MenuController;
use App\Http\Controllers\API\TransactionDetailController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// route api menus
Route::get('/menus', [MenuController::class, 'all']);

// route api checkout
Route::post('/checkout', [CheckoutController::class, 'checkout']);

// route get data transaction by id
Route::get('/transactions/{id}', [TransactionDetailController::class, 'get']);
