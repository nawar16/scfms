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
Route::resource('brokerage_companies', 'BrokerageCompaniesController');
//معلومة 
Route::resource('info', 'InfoController');
//مواقع هامة
Route::resource('important_sites', 'ImportantSitesController');
//فرص عمل
Route::resource('job_opportunities', 'JobOpportunitiesController');
//الشكاوى
Route::resource('complaints', 'ComplaintsController');
//التشريعات والقوانين
Route::resource('regulations_and_decisions', 'RegulationsAndDecisionsController');
// الشركات المساهمة
Route::resource('joint_stock_companies', 'JointStockCompaniesController');
//مدققو الحسابات
Route::resource('auditors', 'AuditorsController');
//اجتماعات الهيئة العامة
Route::resource('meetings', 'MeetingsController');
//الشركات و إفصاحاتها
Route::resource('disclosures', 'DisclosuresController');
//نشرات التوعية 
Route::resource('awareness_prospectus', 'AwarenessProspectusController');
//الرئيسية
Route::resource('home', 'HomeController');
