<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MeetingsController extends Controller
{
    public function index()
    {
        $regulation = \App\Models\Page::where('id', '3695')->first();
        $regulation['sub_pages'] = $regulation->all_sub_pages();
        if($regulation)
        {
            return response()->json([
                'status' => 'success',
                'data' => $regulation
            ]);
        } else{
            return response()->json([
                'status' => 'error',
                'message' => 'something error'
            ]);
        }

    }
}
