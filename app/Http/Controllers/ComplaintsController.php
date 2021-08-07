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
            $complaint->push([
                'name_en' =>  'Complaints',
                'name' => ' الشكاوى   ',
                'id'=>970
            ]);
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
