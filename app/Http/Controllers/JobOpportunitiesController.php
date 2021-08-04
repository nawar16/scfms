<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Page;

class JobOpportunitiesController extends Controller
{
    public function index()
    {
        try {
            $opportunity = Page::where('parent_id', '971')->get();
            $opportunity['name_en'] = 'Job Opportunities';
            $opportunity['name'] = 'فرص عمل  ';
            $opportunity['id'] = 971;
            return response()->json([
                'status' => 'success',
                'data' => $opportunity
            ]);
        } catch(\Exception $ex){
            return response()->json([
                'status' => 'error',
                'message' => 'something error'
            ]);
        }

    }
}
