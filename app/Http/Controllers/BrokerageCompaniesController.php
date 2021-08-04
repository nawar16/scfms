<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Page;

class BrokerageCompaniesController extends Controller
{
    public function index()
    {
        try {
            $company = Page::where('parent_id', '910')->get();
            $company['name_en'] = 'Brokerage  companies';
            $company['name'] = 'شركات الوساطة  ';
            $company['id'] = 910;
            return response()->json([
                'status' => 'success',
                'data' => $company
            ]);
        } catch(\Exception $ex){
            return response()->json([
                'status' => 'error',
                'message' => 'something error'
            ]);
        }

    }
}
