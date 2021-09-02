<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Page;

class TermsController extends Controller
{
    public function index()
    {
        try {
            $meeting = Page::findOrFail('5171')->toArray();
            unset($meeting['pages']);
            $data = Page::where('parent_id', '5171')->get();
            $meeting['data'] = $data;
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
