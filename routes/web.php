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

Route::get('/page/{id}', 'HomeController@show');
Route::post('/search', 'HomeController@search');
Route::post('setting', 'SettingController@setting');
Route::resource('about', 'AboutController');
Route::resource('contact', 'ContactController');
Route::resource('news', 'NewsController');
Route::get('news/{id}/{year}', 'NewsController@news_year');
Route::get('awareness_prospectus/{year}', 'AwarenessProspectusController@awareness_year');
Route::post('form', 'FormController@form');
//اختبر معلوماتك
Route::get('quiz', 'QuizController@quiz');
Route::post('result', 'QuizController@result');
//التشريعات والقوانين
Route::resource('regulations_and_decisions', 'RegulationsAndDecisionsController');
//التعاميم
Route::get('circulars', 'RegulationsAndDecisionsController@circulars');
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
Route::get('company/{id}','DisclosuresController@company');
//Route::get('company_info/{id}', 'DisclosuresController@company_info');
//نشرات التوعية
Route::resource('awareness_prospectus', 'AwarenessProspectusController');
//اخبار الشركات
Route::resource('company_news', 'CompanyNewsController');
//العلاقات الدولية
Route::resource('international_relations','InternationalRelationsController');
//المصطلحات
Route::resource('terms','TermsController');
//الرئيسية
Route::resource('home', 'HomeController');
Route::get('html', function(){
    return view('html');
});
Route::get('html2', function(){
    return view('html2');
});


