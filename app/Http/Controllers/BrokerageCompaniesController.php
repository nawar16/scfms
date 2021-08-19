<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Page;

class BrokerageCompaniesController extends Controller
{
    public function index()
    {
        try {
            $company = Page::where('parent_id', '910')
            ->orderBy('the_order', 'ASC')->orderBy('id', 'DESC')->get();
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
