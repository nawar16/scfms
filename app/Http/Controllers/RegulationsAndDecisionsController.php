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
            $regulation->push([
                'name_en' =>  'Regulations And Decisions',
                'name' => 'التشريعات والقرارات  ',
                'id'=>919
            ]);
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
