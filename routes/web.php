<?php

use App\Http\Controllers\AksesControllerCustomers;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AksesControllerEmployee;
use App\Http\Controllers\AksesControllerOffices;
use App\Http\Controllers\AksesControllerOrderDetails;
use App\Http\Controllers\AksesControllerOrders;
use App\Http\Controllers\AksesControllerPayments;
use App\Http\Controllers\AksesControllerProducts;
use App\Http\Controllers\AksesControllerProductlines;

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

// employee
route::get('callApiGetAllEmployee', [AksesControllerEmployee::class, 'memanggilAPIGetAlldata']);
route::get('callApiGetDetailEmployee/{employeeNumber}', [AksesControllerEmployee::class, 'memanggilAPiGetDetailData']);
route::get('callApiCreateEmployee', [AksesControllerEmployee::class, 'memanggilAPICreate']);
route::get('callApiDeleteEmployee/{employeenumber}', [AksesControllerEmployee::class, 'memanggilApiDelete']);
route::get('callApiUpdateEmployee/{employeenumber}', [AksesControllerEmployee::class, 'memanggilApiUpdate']);

//productlines
Route::get('callApiGetAllProductlines', [AksesControllerProductlines::class, 'memanggilApiGetAllData']);
Route::get('callApiGetDetailProductlines/{productLine}', [AksesControllerProductlines::class, 'memanggilAPiGetDetailData']);
Route::get('callApiCreateProductlines', [AksesControllerProductlines::class, 'memanggilAPICreate']);
Route::get('callApiDeleteProductlines/{productLine}', [AksesControllerProductlines::class, 'memanggilApiDelete']);
Route::get('callApiUpdateProductlines/{productLine}', [AksesControllerProductlines::class, 'memanggilApiUpdate']);

//payments
Route::get('callApiGetAllPayments', [AksesControllerPayments::class, 'memanggilApiGetAllData']);
Route::get('callApiGetDetailPayments/{customerNumber}', [AksesControllerPayments::class, 'memanggilAPiGetDetailData']);
Route::get('callApiCreatePayments', [AksesControllerPayments::class, 'memanggilAPICreate']);
Route::get('callApiDeletePayments/{customerNumber}/{checkNumber}', [AksesControllerPayments::class, 'memanggilApiDelete']);
Route::get('callApiUpdatePayments/{customerNumber}/{checkNumber}', [AksesControllerPayments::class, 'memanggilApiUpdate']);

//products
Route::get('callApiGetAllProducts', [AksesControllerProducts::class, 'memanggilApiGetAllData']);
Route::get('callApiGetDetailProducts/{productCode}', [AksesControllerProducts::class, 'memanggilAPiGetDetailData']);
Route::get('callApiCreateProducts', [AksesControllerProducts::class, 'memanggilAPICreate']);
Route::get('callApiDeleteProducts/{productCode}', [AksesControllerProducts::class, 'memanggilApiDelete']);
Route::get('callApiUpdateProducts/{productCode}', [AksesControllerProducts::class, 'memanggilApiUpdate']);


//customers
Route::get('callApiGetAllCustomers', [AksesControllerCustomers::class, 'memanggilApiGetAllData']);
Route::get('callApiGetDetailCustomers/{customerNumber}', [AksesControllerCustomers::class, 'memanggilAPiGetDetailData']);
Route::get('callApiCreateCustomers', [AksesControllerCustomers::class, 'memanggilAPICreate']);
Route::get('callApiDeleteCustomers/{customerNumber}', [AksesControllerCustomers::class, 'memanggilApiDelete']);
Route::get('callApiUpdateCustomers/{customerNumber}', [AksesControllerCustomers::class, 'memanggilApiUpdate']);

//order
Route::get('callApiGetAllOrders', [AksesControllerOrders::class, 'memanggilApiGetAllData']);
Route::get('callApiGetDetailOrders/{orderNumber}', [AksesControllerOrders::class, 'memanggilAPiGetDetailData']);
Route::get('callApiCreateOrders', [AksesControllerOrders::class, 'memanggilAPICreate']);
Route::get('callApiDeleteOrders/{orderNumber}', [AksesControllerOrders::class, 'memanggilApiDelete']);
Route::get('callApiUpdateOrders/{orderNumber}', [AksesControllerOrders::class, 'memanggilApiUpdate']);

//offices
Route::get('callApiGetAllOffices', [AksesControllerOffices::class, 'memanggilApiGetAllData']);
Route::get('callApiGetDetailOffices/{officeCode}', [AksesControllerOffices::class, 'memanggilAPiGetDetailData']);
Route::get('callApiCreateOffices', [AksesControllerOffices::class, 'memanggilAPICreate']);
Route::get('callApiDeleteOffices/{officeCode}', [AksesControllerOffices::class, 'memanggilApiDelete']);
Route::get('callApiUpdateOffices/{officeCode}', [AksesControllerOffices::class, 'memanggilApiUpdate']);

//orderdetails
Route::get('callApiGetAllOrderdetails', [AksesControllerOrderDetails::class, 'memanggilApiGetAllData']);
Route::get('callApiGetDetailOrderdetails/{orderNumber}/{productCode}', [AksesControllerOrderDetails::class, 'memanggilAPiGetDetailData']);
Route::get('callApiCreateOrderdetails', [AksesControllerOrderDetails::class, 'memanggilAPICreate']);
Route::get('callApiDeleteOrderdetails/{orderNumber}/{productCode}', [AksesControllerOrderDetails::class, 'memanggilApiDelete']);
Route::get('callApiUpdateOrderdetails/{orderNumber}/{productCode}', [AksesControllerOrderDetails::class, 'memanggilApiUpdate']);

// route::resource('callApi', AksesController::class);
