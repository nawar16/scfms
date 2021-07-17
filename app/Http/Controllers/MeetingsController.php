<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MeetingsController extends Controller
{
    public function index()
    {
        $meeting = \App\Models\Page::where('id', '3695')->first();
        if($meeting)
        {
            return response()->json([
                'status' => 'success',
                'data' => $meeting
            ]);
        } else{
            return response()->json([
                'status' => 'error',
                'message' => 'something error'
            ]);
        }

    }
}
