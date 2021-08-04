<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Page;

class JointStockCompaniesController extends Controller
{
    public function index()
    {
        try {
            $stock = Page::where('parent_id', '899')->get();
            $stock['name_en'] = 'Joint-stock companies';
            $stock['name'] = 'الشركات المساهمة  ';
            $stock['id'] = 899;
            return response()->json([
                'status' => 'success',
                'data' => $stock
            ]);
        } catch(\Exception $ex){
            return response()->json([
                'status' => 'error',
                'message' => 'something error'
            ]);
        }

    }
}
