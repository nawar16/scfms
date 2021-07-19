<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Page;

class NewsController extends Controller
{
    public function index()
    {
        try {
            $news = Page::where('parent_id', '73')->get();
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
