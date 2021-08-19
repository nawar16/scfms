<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Page;

class DisclosuresController extends Controller
{
    public function index()
    {
        try {
            $disclosure = Page::where('parent_id', '901')
            ->orderBy('the_order', 'ASC')->orderBy('id', 'DESC')->get();
            return response()->json([
                'status' => 'success',
                'data' => $disclosure
            ]);
        } catch(\Exception $ex){
            return response()->json([
                'status' => 'error',
                'message' => 'something error'
            ]);
        }

    }
}
