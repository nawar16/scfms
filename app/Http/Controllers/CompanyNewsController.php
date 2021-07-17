<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CompanyNewsController extends Controller
{
    public function index()
    {
        $news = \App\Models\Page::where('id', '894')->first();
        if($news)
        {
            return response()->json([
                'status' => 'success',
                'data' => $news
            ]);
        } else{
            return response()->json([
                'status' => 'error',
                'message' => 'something error'
            ]);
        }

    }
}
