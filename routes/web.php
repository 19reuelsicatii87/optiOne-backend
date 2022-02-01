<?php

use Illuminate\Support\Facades\Route;

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

// Based Domain
// =============================================
Route::get(
    '/',
    function () {
        return view('welcome');
    }
);

// Email Sequence
// =============================================
Route::get(
    '/email-sequence/{viewName}',
    function ($viewName) {
        return view($viewName);
    }
);
