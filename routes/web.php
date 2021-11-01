<?php

use App\Http\Controllers\OrderController;
use App\Http\Controllers\ShoppingCartController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LayoutController;
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

//Route::get('/', function () {
//    return view('welcome');
//});

//Admin
Route::get('/', [LayoutController::class, 'getLayout']);
Route::get('/form', [LayoutController::class, 'getForm']);
Route::get('/table', [LayoutController::class, 'getTable']);
Route::get('/deleteList', [LayoutController::class, 'getDeleteList']);
Route::get('/updateList', [LayoutController::class, 'getUpdateList']);
Route::get('/search', [LayoutController::class, 'search']);
Route::get('/detail', [LayoutController::class, 'getDetail']);
Route::get('/edit', [LayoutController::class, 'getEdit']);
Route::get('/delete', [LayoutController::class, 'getDelete']);
Route::get('/contact', [LayoutController::class, 'getContact']);

Route::post('/deleteList', [LayoutController::class, 'processDeleteList']);
Route::post('/updateList', [LayoutController::class, 'processUpdateList']);
Route::post('/form', [LayoutController::class, 'processForm']);
Route::post('/edit', [LayoutController::class, 'processEdit']);
Route::post('/delete', [LayoutController::class, 'processDelete']);
Route::post('/contact', [LayoutController::class, 'processContact']);

////////////////
Route::get('/demo/set-cookie', [ShoppingCartController::class, 'setCookie']);
Route::get('/demo/get-cookie', [ShoppingCartController::class, 'getCookie']);

Route::get('/demo/list', [ShoppingCartController::class, 'getProduct']);
Route::get('/demo/product/recent-view', [ShoppingCartController::class, 'getRecentView']);
Route::get('/demo/product/{id}', [ShoppingCartController::class, 'getProductDetail']);
////////////////
Route::get('/cart/show', [ShoppingCartController::class, 'show']);
Route::get('/cart/add', [ShoppingCartController::class, 'add']);
Route::post('/cart/update', [ShoppingCartController::class, 'update']);
Route::get('/cart/remove', [ShoppingCartController::class, 'remove']);
Route::post('/order', [OrderController::class, 'process']);
Route::get('/order/{id}', [OrderController::class, 'getDetail']);
Route::get('/check-mail', [OrderController::class, 'getCheckMail']);
Route::post('/order/create-payment', [OrderController::class, 'createPayment']);
Route::post('/order/execute-payment', [OrderController::class, 'executePayment']);

