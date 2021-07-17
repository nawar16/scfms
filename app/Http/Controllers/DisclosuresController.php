<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DisclosuresController extends Controller
{
    public function index()
    {
        $disclosure = \App\Models\Page::where('id', '901')->first();
        if($disclosure)
        {
            return response()->json([
                'status' => 'success',
                'data' => $disclosure
            ]);
        } else{
            return response()->json([
                'status' => 'error',
                'message' => 'something error'
            ]);
        }

    }
}
