<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Page;

class ContactController extends Controller
{
    public function index()
    {
        try{
            $contact = Page::where('id', '2')->first();
            $contact['name_en'] = 'Contact';
            $contact['name'] = ' اتصل بنا   ';
            $contact['id'] = 2;
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
