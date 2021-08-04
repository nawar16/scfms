<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Page;

class AboutController extends Controller
{
    public function index()
    {
        try {
            $about = Page::where('parent_id', '1')->get();
            $about['name_en'] = 'About';
            $about['name'] = ' حول الهيئة';
            $about['id'] = 1;
            return response()->json([
                'status' => 'success',
                'data' => $about
            ]);
        } catch(\Exception $ex){
            return response()->json([
                'status' => 'error',
                'message' => 'something error'
            ]);
        }

    }
}
