<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Page;

class InfoController extends Controller
{
    public function index()
    {
        try {
            $info = Page::where('parent_id', '9273')
            ->orderBy('the_order', 'ASC')->orderBy('id', 'DESC')->get();
            return response()->json([
                'status' => 'success',
                'data' => $info
            ]);
        } catch(\Exception $ex){
            return response()->json([
                'status' => 'error',
                'message' => 'something error'
            ]);
        }

    }
}
