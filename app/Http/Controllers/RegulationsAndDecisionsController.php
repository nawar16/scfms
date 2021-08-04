<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Page;

class RegulationsAndDecisionsController extends Controller
{
    public function index()
    {
        try {
            $regulation = Page::where('parent_id', '919')->get();
            $regulation['name_en'] = 'Regulations And Decisions';
            $regulation['name'] = 'التشريعات والقرارات  ';
            $regulation['id'] = 919;
            return response()->json([
                'status' => 'success',
                'data' => $regulation
            ]);
        } catch(\Exception $ex){
            return response()->json([
                'status' => 'error',
                'message' => 'something error'
            ]);
        }

    }
}
