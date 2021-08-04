<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Page;

class ArbitratorsController extends Controller
{
    public function index()
    {
        try {
            $arbitrators = Page::where('parent_id', '954')->get();
            $arbitrators['name_en'] = 'Arbitrators';
            $arbitrators['name'] = 'المحكمون ';
            $arbitrators['id'] = 954;
            return response()->json([
                'status' => 'success',
                'data' => $arbitrators
            ]);
        } catch(\Exception $ex){
            return response()->json([
                'status' => 'error',
                'message' => 'something error'
            ]);
        }

    }
}
