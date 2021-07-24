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

Route::get('/', function () {
    return view('welcome');
});


Route::resource('about', 'AboutController');
Route::resource('contact', 'ContactController');
Route::resource('news', 'NewsController');
//التشريعات والقوانين
Route::resource('regulations_and_decisions', 'RegulationsAndDecisionsController');
//شركات الوساطة
Route::resource('brokerage_companies', 'BrokerageCompaniesController');
// الشركات المساهمة
Route::resource('joint_stock_companies', 'JointStockCompaniesController');
//مدققو الحسابات
Route::resource('auditors', 'AuditorsController');
//معلومة 
Route::resource('info', 'InfoController');
//مواقع هامة
Route::resource('important_sites', 'ImportantSitesController');
//فرص عمل
Route::resource('job_opportunities', 'JobOpportunitiesController');
//الشكاوى
Route::resource('complaints', 'ComplaintsController');
//اعلانات الشركات المساهمة
Route::resource('joint_stock_announcements', 'JointStockAnnouncementsController');
//التوعية
Route::resource('awareness', 'AwarenessController');
//التقرير السنوي
Route::resource('annual_report', 'AnnualReportController');
//أدلة إرشادية واستمارات
Route::resource('manuals_and_forms', 'ManualsAndFormsController');
//المحكومون
Route::resource('arbitrators', 'ArbitratorsController');

//اجتماعات الهيئة العامة
Route::resource('meetings', 'MeetingsController');
//الشركات و إفصاحاتها
Route::resource('disclosures', 'DisclosuresController');
//نشرات التوعية 
Route::resource('awareness_prospectus', 'AwarenessProspectusController');
//اخبار الشركات
Route::resource('company_news', 'CompanyNewsController');
//العلاقات الدولية
Route::resource('international_relations','InternationalRelationsController');
//القائمة 
Route::resource('menu', 'MenuController');
//الرئيسية
//Route::resource('home', 'HomeController');
