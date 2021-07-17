<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InfoController extends Controller
{
    public function index()
    {
        $info = \App\Models\Page::where('id', '9273')->first();
        if($info)
        {
            return response()->json([
                'status' => 'success',
                'data' => $info
            ]);
        } else{
            return response()->json([
                'status' => 'error',
                'message' => 'something error'
            ]);
        }

    }
}
