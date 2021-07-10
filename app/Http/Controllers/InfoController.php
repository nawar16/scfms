<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InfoController extends Controller
{
    public function index()
    {
        $info = \App\Models\Info::paginate(10);
        if($info)
        {
            return response()->json([
                'status' => 'success',
                'data' => $info
            ]);
        } else{
            return response()->json([
                'status' => 'error',
                'message' => 'something error'
            ]);
        }

    }
}
