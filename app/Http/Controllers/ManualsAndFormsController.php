<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Page;

class ManualsAndFormsController extends Controller
{
    public function index()
    {
        try {
            $form = Page::where('parent_id', '1010')->paginate(10);
            $form->push([
                'name_en' =>  'Manuals and Forms',
                'name' => 'أدلة إرشادية واستمارات  ',
                'id'=>1010
            ]);
            return response()->json([
                'status' => 'success',
                'data' => $form
            ]);
        } catch(\Exception $ex){
            return response()->json([
                'status' => 'error',
                'message' => 'something error'
            ]);
        }

    }
}

