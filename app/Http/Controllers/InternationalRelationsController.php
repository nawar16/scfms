<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Page;

class InternationalRelationsController extends Controller
{
    public function index()
    {
        try {
            $relation = Page::where('parent_id', '1497')->get();
            $relation['name_en'] = 'International Relations';
            $relation['name'] = 'العلاقات الدولية  ';
            $relation['id'] = 1497;
            return response()->json([
                'status' => 'success',
                'data' => $relation
            ]);
        } catch(\Exception $ex){
            return response()->json([
                'status' => 'error',
                'message' => 'something error'
            ]);
        }

    }
}
