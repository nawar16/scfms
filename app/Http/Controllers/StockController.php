<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StockController extends Controller
{
    public function index()
    {
        $stock = \App\Models\Page::where('id', '910')->first();
        $stock['sub_pages'] = $stock->all_sub_pages();
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
