<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Page;

class SettingController extends Controller
{
    public function index()
    {
        try {
            $copy_right =  " Powered by <a href=\"#\" target=\"_blank\">SWT</a> Web Service Provider - all rights reserved ".date('Y');
            $menu = Page::where('parent_id',0)->whereNotIn('id', [9282])->get();
            //$menu->makeHidden(['pages']);
            //$have_sub_menu = Page::whereIn('id', [1, 919, 899, 890, 1497])->get();
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
                'data' => $menu,
                'copy_right' => $copy_right
            ]);
        } catch(\Exception $ex){
            return response()->json([
                'status' => 'error',
                'message' => 'something error'
            ]);
        }

    }
}
