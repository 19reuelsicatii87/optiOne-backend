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


Route::post('/addPackage', 'PackageController@addPackage');
Route::post('/updatePackage', 'PackageController@updatePackage');
Route::get('/getPackage/{order_code}', 'PackageController@getPackage');
Route::get('/listOptiPackages', 'PackageController@listOptiPackages');
Route::get('/listDeliveryOptions', 'PackageController@listDeliveryOptions');
Route::get('/listPaymentOptions', 'PackageController@listPaymentOptions');
