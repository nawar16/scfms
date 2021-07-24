<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Page;

class AwarenessProspectusController extends Controller
{
    public function index()
    {
        try {
            $awareness = Page::where('parent_id', '990')->paginate(10);
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