<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Page;

class HomeController extends Controller
{
    public function index()
    {
        //التقارير السنوية
        $reports = Page::where('parent_id', '3984')->where('Active', '1')
        ->orderBy('year', 'DESC')->orderBy('publish_date', 'DESC')
        ->orderBy('the_order', 'DESC')->orderBy('id', 'DESC')->limit(1)->get();
        //نشرات التوعية
        $awareness = Page::where('parent_id', '990')->where('Active', '1')
        ->orderBy('the_order', 'DESC')->orderBy('id', 'DESC')->limit(10)->get();
        //اجتماعات الهيئة العامة
        $general_assembly_meetings = Page::where('parent_id', '3695')->where('Active', '1')->limit(50)->get();
        //اخبار الشركات 
        $company_news = Page::where('parent_id', '894')->get();
        //التشريعات والقرارات والتعاميم
        $regulations = Page::whereIn('parent_id', array(919, 1000))
        ->where(function ($q) {
            $q->where('src_1', '<>', '')->orWhere('src_1_en', '<>', '');
        })
        ->where('Active', '1')->orderBy('id', 'DESC')->limit(3)->get();
        //نشرات الاصدار
        $prospectuses = Page::where('parent_id', '900')->where('Active', '1')
        ->orderBy('the_order', 'DESC')->orderBy('id', 'DESC')->limit(10)->get();
        // إعلانات الشركات المساهمة
        $stock_announcements = Page::where('parent_id', '7063')->get();
        //معلومة
        $info_on_fly = Page::where('parent_id', '9273')->where('Active', '1')->limit(50)->get();
        //الافصاحات
        $disclosures = Page::where('parent_id', '901')->where('Active', '1')->limit(50)->get();
        
        if($reports && $awareness && $company_news && $regulations && $prospectuses && $stock_announcements && $info_on_fly)
        {
            return response()->json([
                'status' => 'success',
                'data' => [
                    'company_news' => $company_news,
                    'disclosures' => $disclosures,
                    'annual_report' => $reports,
                    'awareness-prospectus' => $awareness,
                    'general_assembly_meetings' => $general_assembly_meetings,
                    'regulations_and_decisions' => $regulations,
                    'prospectuses' => $prospectuses,
                    'joint_stock_announcements' => $stock_announcements,
                    'information_on_fly' => $info_on_fly,
                ]
            ]);
        } else{
            return response()->json([
                'status' => 'error',
                'message' => 'something error'
            ]);
        }
    }
    public function show($id)
    {
        try {
            $page = Page::findOrFail($id);
            return response()->json([
                'status' => 'success',
                'data' => $page
            ]);
        } catch(\Exception $ex){
            return response()->json([
                'status' => 'error',
                'message' => 'something error'
            ]);
        }

    }


}
