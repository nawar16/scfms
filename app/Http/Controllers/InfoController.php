<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Page;

class InfoController extends Controller
{
    public function index()
    {
        try {
            $info = Page::where('parent_id', '9273')->get();
            //$o = Page::where('id', '9299')->first();
            //return $o;
            /*$response = \Response::make($o->text);
            $response->header('Content-Type', 'text/html');
            return $response;*/
            //return $info[2]->text;
            $info->push([
                'name_en' =>  'Information on fly',
                'name' => 'معلومة  ',
                'id'=>9273
            ]);
            return response()->json([
                'status' => 'success',
                'data' => $info
            ]);
            //->header('Content-Type', 'text/html');
        } catch(\Exception $ex){
            return response()->json([
                'status' => 'error',
                'message' => 'something error'
            ]);
        }

    }
}
