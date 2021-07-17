<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ComplaintsController extends Controller
{
    public function index()
    {
        $complaint = \App\Models\Page::where('id', '970')->first();
        if($complaint)
        {
            return response()->json([
                'status' => 'success',
                'data' => $complaint
            ]);
        } else{
            return response()->json([
                'status' => 'error',
                'message' => 'something error'
            ]);
        }

    }
}
