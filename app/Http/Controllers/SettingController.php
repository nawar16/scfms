<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Page;
use App\Helpers;
use App\Models\Device;

class SettingController extends Controller
{
    protected $version_name = "1.0";
    protected $version_code = 1;
    protected $copyright_txt ='';// "Powered by <a href=\"#\" target=\"_blank\">SWT</a>";
    protected $copyright_link = '';//"https://syrianmonster.com/";
    protected $facebook_url = "https://www.facebook.com/scfms.sy/";
    protected $instagram_url = "https://www.instagram.com/scfms.sy/";


    public function register_device(Request $request)
    {
        $validate = $this->validate($request, [
            'device_id' => 'required',
        ]);
        $ip = request('ip');
        $device_id = request('device_id');
        $device_name = request('device_name');
        $device_company = request('device_company');
        $android_version = request('android_version');
        $token  = request('token');

        $check = Device::where('device_id',$device_id)->first();
        $data = [
            'ip' => $ip,
            'device_id' => $device_id,
            'device_name' => $device_name,
            'device_company' => $device_company,
            'android_version' => $android_version,
            'token' => $token,
        ];
        if($check){
            $insert = $check->update($data);
            $msg = 'Update '.$device_id;
        }else{
            $insert = Device::create($data);
            $msg = 'Create '.$device_id;
        }

        if ($insert) {
            $response = [
                'status' => true,
                'msg' => $msg,
            ];
        } else {
            $response = [
                'status' => false,
                'msg' => 'خطأ ',
            ];
        }
        return $response;
    }
    public function setting(Request $request)
    {
        try {
            $res = $this->register_device($request);
            if($res['status'] == false)
            {
                return response()->json([
                    'status' => 'error',
                    'message' => 'failed store device data'
                ]);
            }
            $menu = Page::where('parent_id',0)->whereNotIn('id', [9282,1019,159])
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
            $menu->push(
            [
                 'name_en' => 'Settings',
                 'name' => 'إعدادات التطبيق',
                 'id'=>0
            ]);
            $insert = [
                'name_en' => 'Damascuse Securities Exchange',
                'name' => 'سوق دمشق للأوراق المالية',
                'id' => '10000',
                'sub_menu' => [
                    [
                        'name_en' => 'Market Summary ',
                        'name' => 'ملخص السوق',
                        'id' => '10001',
                    ],
                    [
                        'name_en' => 'Market Performance ',
                        'name' => 'أداء السوق',
                        'id' => '10002',
                    ],
                    [
                        'name_en' => 'Exchange Report ',
                        'name' => 'نشرة التداول',
                        'url' => 'http://dse.sy/reports/exchange_report',
                        'id' => '10003',
                    ],
                ]
            ];
            $menu->put(16, $insert);
            $info = Page::where('parent_id',9273)->orderBy('the_order', 'ASC')
            ->orderBy('id', 'DESC')->first();
            $res_info['id'] = $info->id;
            $info_html = "<div style='display:inline-block; margin-left: auto; margin-right: auto; text-align: right;'>";
            $info_html .= "<div style='margin: 30px 0'>";
            $info_html .= "<img src='http://www.scfms.sy/images/fyi-header.png' style='max-width: 100%; height: auto; margin-left: auto; margin-right: auto;'/>";
            $info_html .= "</div>";
            $info_html .= "<div style='margin: 30px 0'>";
            $info_html .= "<img src='$info->photo' style='max-width: 100%; height: auto; margin-left: auto; margin-right: auto;'/>";
            $info_html .= "</div>";
            $info_html .= "<h3 style='text-align:right'>".$info->name."</h3>";
            $info_html .= "<div style='text-align: right; margin: 10px 10px'>".$info->text."</div>";
            $info_html .= "</div>";
            $res_info['content'] = $info_html;
            return response()->json([
                'status' => 'success',
                'menu' => $menu,
                'info' => $res_info,
                'date_en' => \Carbon\Carbon::now()->format('D d F Y'),
                'date_ar' => get_html_date_time(strtotime(date('Y-m-d'))),
                'copyright_txt' => $this->copyright_txt,
                'copyright_link' => $this->copyright_link,
                'version_name' => $this->version_name,
                'version_code' => $this->version_code,
                'facebook_url' => $this->facebook_url,
                'instagram_url' => $this->instagram_url
            ]);
        } catch(\Exception $ex){
            return response()->json([
                'status' => 'error',
                'message' => 'something error'
            ]);
        }

    }
}
