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
            $awareness['name_en'] = 'Awareness';
            $awareness['name'] = 'التوعية ';
            $awareness['id'] = 890;
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
