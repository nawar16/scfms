<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Page;

class MeetingsController extends Controller
{
    public function index()
    {
        try {
            $meeting = Page::where('parent_id', '3695')->orderBy('e_date', 'DESC')->get();
            return response()->json([
                'status' => 'success',
                'data' => $meeting
            ]);
        } catch(\Exception $ex){
            return response()->json([
                'status' => 'error',
                'message' => 'something error'
            ]);
        }

    }
}
