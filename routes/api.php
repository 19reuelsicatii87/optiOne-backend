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
Route::post('/updateProduct', 'ProductController@updateProduct');
Route::get('/getProduct/{order_code}', 'ProductController@getProduct');



// Package Controller
// ========================================================
Route::post('/addPackage', 'PackageController@addPackage');
Route::post('/updatePackage', 'PackageController@updatePackage');
Route::get('/getPackage/{order_code}', 'PackageController@getPackage');
Route::get('/listOptiPackages', 'PackageController@listOptiPackages');
Route::get('/listDeliveryOptions', 'PackageController@listDeliveryOptions');
Route::get('/listPaymentOptions', 'PackageController@listPaymentOptions');


// Lead Controller
// ========================================================
Route::post('/addLead','LeadController@addLead');
Route::get('/listLead','LeadController@listLead');
Route::delete('/deleteLead/{id}','LeadController@deleteLead');
Route::get('/getLead/{id}','LeadController@getLead');
Route::post('/getLeadForm','LeadController@getLeadForm');
Route::post('/updateLead','LeadController@updateLead');
