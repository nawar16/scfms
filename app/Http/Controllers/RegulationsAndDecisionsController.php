<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Page;

class RegulationsAndDecisionsController extends Controller
{
    public function index()
    {
        try {
            $regulation = Page::where('parent_id', '919')->whereNotIn('id', ['1000'])
            ->orderBy('the_order', 'ASC')->orderBy('id', 'DESC')->get();
            $circulars = Page::where('id', '1000')->first()->toArray();
            unset($circulars['pages']);
            $pages = Page::where('parent_id', '1000')->get();
            $circulars['pages'] = $pages;
            $regulation[4] = $circulars;
            return response()->json([
                'status' => 'success',
                'data' => $regulation
            ]);
        } catch(\Exception $ex){
            return response()->json([
                'status' => 'error',
                'message' => 'something error'
            ]);
        }

    }
}
