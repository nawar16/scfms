<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class JointStockCompaniesController extends Controller
{
    public function index()
    {
        $stock = \App\Models\Page::where('id', '899')->first();
        if($stock)
        {
            return response()->json([
                'status' => 'success',
                'data' => $stock
            ]);
        } else{
            return response()->json([
                'status' => 'error',
                'message' => 'something error'
            ]);
        }

    }
}
