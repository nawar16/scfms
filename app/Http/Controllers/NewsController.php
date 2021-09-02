<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Page;

class NewsController extends Controller
{
    public function index()
    {
        try {
            $news = Page::where('parent_id', '73')->orderBy('the_order', 'ASC')->orderBy('id', 'DESC')->get();
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
    public function news_year($id, $year)
    {
        try {
            $news = Page::where('parent_id', $id)
            ->whereYear('publish_date',$year)
            ->orderBy('the_order', 'ASC')
            ->orderBy('id', 'DESC')->paginate(10);
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
