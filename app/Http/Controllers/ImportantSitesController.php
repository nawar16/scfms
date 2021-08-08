<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Page;

class ImportantSitesController extends Controller
{
    public function index()
    {
        try {
            $sites = Page::where('parent_id', '972')->get();
            return response()->json([
                'status' => 'success',
                'data' => $sites
            ]);
        } catch(\Exception $ex){
            return response()->json([
                'status' => 'error',
                'message' => 'something error'
            ]);
        }

    }
}
