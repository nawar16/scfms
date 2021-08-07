<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Page;

class DisclosuresController extends Controller
{
    public function index()
    {
        try {
            $disclosure = Page::where('parent_id', '901')->get();
            $disclosure->push([
                'name_en' =>  'Companies And Disclosures',
                'name' => 'الشركات و إفصاحاتها   ',
                'id'=>901
            ]);
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
