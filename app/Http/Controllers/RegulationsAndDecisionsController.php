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
