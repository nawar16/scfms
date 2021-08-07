<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Page;

class CompanyNewsController extends Controller
{
    public function index()
    {
        try {
            $news = Page::where('parent_id', '894')->paginate(10);
            $news->push([
                'name_en' =>  'Company News',
                'name' => 'اخبار الشركات   ',
                'id'=>894
            ]);
            return response()->json([
                'status' => 'success',
                'data' => $news
            ]);
        } catch(\Exception $ex){
            return response()->json([
                'status' => 'error',
                'message' => 'something error'
            ]);
        }

    }
}
