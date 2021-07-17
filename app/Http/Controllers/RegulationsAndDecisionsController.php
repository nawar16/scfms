<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegulationsAndDecisionsController extends Controller
{
    public function index()
    {
        $regulation = \App\Models\Page::where('id', '919')->first();
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
