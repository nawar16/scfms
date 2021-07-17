<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ImportantSitesController extends Controller
{
    public function index()
    {
        $sites = \App\Models\Page::where('id', '972')->first();
        if($sites)
        {
            return response()->json([
                'status' => 'success',
                'data' => $sites
            ]);
        } else{
            return response()->json([
                'status' => 'error',
                'message' => 'something error'
            ]);
        }

    }
}
