<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuditorsController extends Controller
{
    public function index()
    {
        $auditor = \App\Models\Page::where('id', '953')->first();
        if($auditor)
        {
            return response()->json([
                'status' => 'success',
                'data' => $auditor
            ]);
        } else{
            return response()->json([
                'status' => 'error',
                'message' => 'something error'
            ]);
        }

    }
}
