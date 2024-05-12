<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\PaymentsController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\CustomersController;
use App\Http\Controllers\EmployeesController;
use App\Http\Controllers\CollectionController;
use App\Http\Controllers\OfficesController;
use App\Http\Controllers\OrderdetailsController;
use App\Http\Controllers\ProductlinesController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

//users
// route::get('getAllUsers', [UserController::class, 'getUsers']);
// route::get('getAllUsersToo', [UserController::class, 'getUsers'])->middleware('auth:sanctum');

//collections
// route::get('getAllCollections', [CollectionController::class, 'getCollections']);
// route::get('getAllCollectionsToo', [CollectionController::class, 'getCollections'])->middleware('auth:sanctum');

// REST API
// Route::middleware('auth:sanctum')->group(function () {
//     Route::resource('collections', CollectionController::class);
// });

// employees
Route::middleware('auth:sanctum')->group(function () {
    Route::resource('employees', EmployeesController::class);
    Route::resource('productlines', ProductlinesController::class);
    //     Route::resource('payments', PaymentsController::class);
    Route::resource('products', ProductsController::class);
    Route::resource('orders', OrdersController::class);
    Route::resource('customers', CustomersController::class);
    Route::resource('offices', OfficesController::class);
});

//payments
Route::get('payments', [PaymentsController::class, 'index']);
Route::get('paymentsDetail/{customerNumber}', [PaymentsController::class, 'show']);
Route::post('paymentsCreate', [PaymentsController::class, 'store']);
Route::put('paymentsUpdate/{customerNumber}/{checkNumber}', [PaymentsController::class, 'update']);
Route::delete('paymentsDelete/{customerNumber}/{checkNumber}', [PaymentsController::class, 'destroy']);

//orders details
Route::get('ordersDetails', [OrderdetailsController::class, 'index']);
Route::get('ordersDetails/{orderNumber}/{productCode}', [OrderdetailsController::class, 'show']);
Route::post('ordersDetailsCreate', [OrderdetailsController::class, 'store']);
Route::put('ordersDetailsUpdate/{orderNumber}/{productCode}', [OrderdetailsController::class, 'update']);
Route::delete('ordersDetailsDelete/{orderNumber}/{productCode}', [OrderdetailsController::class, 'destroy']);
