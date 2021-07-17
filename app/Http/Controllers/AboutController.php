<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        $about = \App\Models\Page::where('id', '1')->first();
        if($about)
        {
            return response()->json([
                'status' => 'success',
                'data' => $about
            ]);
        } else{
            return response()->json([
                'status' => 'error',
                'message' => 'something error'
            ]);
        }

    }
}
