<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Page;

class AwarenessController extends Controller
{
    public function index()
    {
        try {
            $awareness = Page::where('parent_id', '890')->paginate(10);
            $awareness->push([
                'name_en' => 'Awareness',
                'name' => 'التوعية ',
                'id'=>890
            ]);
            return response()->json([
                'status' => 'success',
                'data' => $awareness
            ]);
        } catch(\Exception $ex){
            return response()->json([
                'status' => 'error',
                'message' => 'something error'
            ]);
        }

    }
}
