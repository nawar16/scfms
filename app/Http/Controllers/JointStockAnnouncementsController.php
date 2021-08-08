<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Page;

class JointStockAnnouncementsController extends Controller
{
    public function index()
    {
        try {
            $announcement = Page::where('parent_id', '7063')->paginate(10);
            return response()->json([
                'status' => 'success',
                'data' => $announcement
            ]);
        } catch(\Exception $ex){
            return response()->json([
                'status' => 'error',
                'message' => 'something error'
            ]);
        }

    }
}
