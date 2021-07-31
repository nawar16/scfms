<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Page;
use App\Helpers;
use App\Models\MobileData;

class SettingController extends Controller
{
    public function setting(Request $request)
    {
        try {
            //dd('hi');
            MobileData::create([
                'ip'=> $request->ip,
                'device_id' => $request->device_id,
                'device_name' => $request->device_name,
                'device_company' => $request->device_company,
                'android_version' => $request->android_version,
                'token' => $request->token
            ]);
            $copy_right = "Powered by <a href=\"#\" target=\"_blank\">SWT</a>";
            $menu = Page::where('parent_id',0)->whereNotIn('id', [9282])
            ->orderBy('the_order', 'ASC')->orderBy('id', 'DESC')->get();
            $have_sub_menu = Page::whereIn('id', [1, 919, 899, 890, 1497])->get();
            foreach($menu as $hsm)
            {
                if($have_sub_menu->contains($hsm))
                {
                    $sub_pages = Page::where('parent_id',$hsm->id)->get(['id', 'name', 'name_en']);
                    foreach($sub_pages as $sub)
                    $sub->setRelation('pages', null);
                    $hsm['sub_menu'] = $sub_pages;
                    $hsm->setRelation('pages', null);
                } else {
                    $hsm->setRelation('pages', null);
                }
            }
            $info = Page::where('parent_id',9273)->orderBy('the_order', 'ASC')
            ->orderBy('id', 'DESC')->first();
            return response()->json([
                'status' => 'success',
                'menu' => $menu,
                'info' => $info,
                'date_en' => \Carbon\Carbon::now()->format('D d F Y'),
                'date_ar' => get_html_date_time(strtotime(date('Y-m-d'))),
                'copy_right' => $copy_right,
                'version_name' => '1.0',
                'version_code' => 1
            ]);
        } catch(\Exception $ex){
            return response()->json([
                'status' => 'error',
                'message' => 'something error'
            ]);
        }

    }
}
