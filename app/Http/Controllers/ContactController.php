<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Page;

class ContactController extends Controller
{
    public function index()
    {
        try{
            $contact = Page::where('id', '2')
            ->orderBy('the_order', 'ASC')->orderBy('id', 'DESC')
            ->first();
            return response()->json([
                'status' => 'success',
                'data' => $contact
            ]);
        } catch(\Exception $ex){
            return response()->json([
                'status' => 'error',
                'message' => 'something error'
            ]);
        }

    }
}
