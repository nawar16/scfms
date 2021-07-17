<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AwarenessProspectusController extends Controller
{
    public function index()
    {
        $awareness = \App\Models\Page::where('id', '990')->first();
        if($awareness)
        {
            return response()->json([
                'status' => 'success',
                'data' => $awareness
            ]);
        } else{
            return response()->json([
                'status' => 'error',
                'message' => 'something error'
            ]);
        }

    }
}
