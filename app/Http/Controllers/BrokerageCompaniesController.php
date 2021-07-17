<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BrokerageCompaniesController extends Controller
{
    public function index()
    {
        $company = \App\Models\Page::where('id', '910')->first();
        if($company)
        {
            return response()->json([
                'status' => 'success',
                'data' => $company
            ]);
        } else{
            return response()->json([
                'status' => 'error',
                'message' => 'something error'
            ]);
        }

    }
}
