<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class JobOpportunitiesController extends Controller
{
    public function index()
    {
        $opportunity = \App\Models\Page::where('id', '971')->first();
        $opportunity['sub_pages'] = $opportunity->all_sub_pages();
        if($opportunity)
        {
            return response()->json([
                'status' => 'success',
                'data' => $opportunity
            ]);
        } else{
            return response()->json([
                'status' => 'error',
                'message' => 'something error'
            ]);
        }

    }
}
