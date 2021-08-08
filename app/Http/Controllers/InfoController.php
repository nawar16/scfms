<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Page;

class InfoController extends Controller
{
    public function index()
    {
        /*$info = Page::where('parent_id',9273)->orderBy('the_order', 'ASC')
        ->orderBy('id', 'DESC')->first();
        $res_info['id'] = $info->id;
        $info_html = "<div >";
        $info_html .= "<h3 style=\"text-align:right\">".$info->name."</h3>";
        $info_html .= '<img src="'.$info->image.'" style=\'display: block; margin-left: auto; margin-right: auto;\'/>';
        $info_html .= '<div>'.$info->text.'</div>';
        $info_html .= "</div>";
        $res_info['content'] = $info_html;
        return $info_html;*/
        try {
            $info = Page::where('parent_id', '9273')->get();
            return response()->json([
                'status' => 'success',
                'data' => $info
            ]);
        } catch(\Exception $ex){
            return response()->json([
                'status' => 'error',
                'message' => 'something error'
            ]);
        }

    }
}
