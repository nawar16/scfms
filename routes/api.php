<?php

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('about', 'AboutController');
Route::resource('news', 'NewsController');
//شركات الوساطة
Route::resource('stock', 'StockController');
//معلومة 
Route::resource('info', 'InfoController');
//مواقع هامة
Route::resource('important_sites', 'ImportantSitesController');
//فرص عمل
Route::resource('job_opportunities', 'JobOpportunitiesController');
//الشكاوى
Route::resource('complaints', 'ComplaintsController');


