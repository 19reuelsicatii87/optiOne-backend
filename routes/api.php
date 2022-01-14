<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PackageController;

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

// User Controller
// ========================================================
Route::post('/register','UserController@register');
Route::post('/login','UserController@login');


// Seeder Controller -DeliveryOption, PaymentOption, OptiPackages
// ================================================================
Route::post('/addDeliveryOption', 'SeederController@addDeliveryOption');
Route::post('/updateDeliveryOption', 'SeederController@updateDeliveryOption');
Route::post('/addPaymentOption', 'SeederController@addPaymentOption');
Route::post('/updatePaymentOption', 'SeederController@updatePaymentOption');
Route::post('/addOptiPackage', 'SeederController@addOptiPackage');
Route::post('/updateOptiPackage', 'SeederController@updateOptiPackage');


// Product Controller
// ========================================================
Route::post('/addProduct', 'ProductController@addProduct');
Route::get('/listProduct','ProductController@listProduct');
Route::post('/searchProduct','ProductController@searchProduct');
Route::delete('/deleteProduct/{id}','ProductController@deleteProduct');
Route::get('/getProductbyID/{id}','ProductController@getProductbyID');
Route::post('/updateProduct', 'ProductController@updateProduct');
Route::post('/updateProductFromDashboard', 'ProductController@updateProductFromDashboard');
Route::get('/getProduct/{order_code}', 'ProductController@getProduct');
Route::get('/listGuestOptiProducts', 'ProductController@listGuestOptiProducts');
Route::get('/listMemberOptiProducts', 'ProductController@listMemberOptiProducts');
Route::get('/listProduct', 'ProductController@listProduct');



// Package Controller
// ========================================================
Route::post('/addPackage', 'PackageController@addPackage');
Route::get('/listPackage','PackageController@listPackage');
Route::post('/searchPackage','PackageController@searchPackage');
Route::post('/updatePackage', 'PackageController@updatePackage');
Route::post('/updatePackageFromDashboard', 'PackageController@updatePackageFromDashboard');
Route::get('/getPackage/{order_code}', 'PackageController@getPackage');
Route::get('/listOptiPackages', 'PackageController@listOptiPackages');
Route::get('/listDeliveryOptions', 'PackageController@listDeliveryOptions');
Route::get('/listPaymentOptions', 'PackageController@listPaymentOptions');


// Lead Controller
// ========================================================
Route::post('/addLead','LeadController@addLead');
Route::get('/listLead','LeadController@listLead');
Route::post('/searchLead','LeadController@searchLead');
Route::delete('/deleteLead/{id}','LeadController@deleteLead');
Route::get('/getLead/{id}','LeadController@getLead');
Route::post('/getLeadForm','LeadController@getLeadForm');
Route::post('/updateLead','LeadController@updateLead');
