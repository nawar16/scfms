<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Page;

class AnnualReportController extends Controller
{
    public function index()
    {
        try {
            $report = Page::where('parent_id', '3984')->where('Active', '1')
            ->orderBy('year', 'DESC')->orderBy('publish_date', 'DESC')
            ->orderBy('the_order', 'DESC')->orderBy('id', 'DESC')->get();
            $report->push([
                'name_en' => 'ِِAnnual Report',
                'name' => ' التقرير السنوي ',
                'id'=>3984
            ]);
            return response()->json([
                'status' => 'success',
                'data' => $report
            ]);
        } catch(\Exception $ex){
            return response()->json([
                'status' => 'error',
                'message' => 'something error'
            ]);
        }

    }
}
