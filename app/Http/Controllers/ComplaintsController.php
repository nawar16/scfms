<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Page;

class ComplaintsController extends Controller
{
    public function index()
    {
        try {
            $complaint = Page::where('id', '970')->first();
            $complaint['name_en'] = 'Complaints';
            $complaint['name'] = ' الشكاوى   ';
            $complaint['id'] = 970;
            return response()->json([
                'status' => 'success',
                'data' => $complaint
            ]);
        } catch(\Exception $ex){
            return response()->json([
                'status' => 'error',
                'message' => 'something error'
            ]);
        }

    }
}
