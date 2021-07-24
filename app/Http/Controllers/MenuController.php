<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Page;

class MenuController extends Controller
{
    public function index()
    {
        try {
            $menu = Page::where('parent_id',0)->whereNotIn('id', [9282])->get();
            //$menu->makeHidden(['pages']);
            $have_sub_menu = Page::whereIn('id', [1, 919, 899, 890, 1497])->get();
            foreach($menu as $hsm)
            {
                if($hsm->pages)
                {
                    $sub_pages = Page::where('parent_id',$hsm->id)->get(['id', 'name', 'name_en']);
                    foreach($sub_pages as $sub)
                    $sub->setRelation('pages', null);
                    $hsm['sub_menu'] = $sub_pages;
                    $hsm->setRelation('pages', null);
                }
            }
            return response()->json([
                'status' => 'success',
                'data' => $menu
            ]);
        } catch(\Exception $ex){
            return response()->json([
                'status' => 'error',
                'message' => 'something error'
            ]);
        }

    }
}
