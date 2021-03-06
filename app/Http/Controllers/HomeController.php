<?php

namespace App\Http\Controllers;

use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Http\Request;
use App\Models\Page;

class HomeController extends Controller
{
    public function index()
    {
        $all_files = Page::whereNotIn('file_type',['release_bulletin','advertise',''] )
        ->where('year', 'like', date("Y"))
        ->where('Active', 1)
        ->orderBy('the_order', 'DESC')->orderBy('id', 'DESC')
        ->pluck('parent_id');
        $ids = array();
        foreach($all_files as $file) {
            if($file) array_push($ids, $file);
        }
        array_push($ids, -1);
        $companies = Page::whereIn('id', $ids)
        ->orderBy('last_update', 'DESC')->orderBy('id', 'DESC')
        ->limit(5)->get();

        $disclosure_table = array();
        foreach($companies as $company)
        {
            $res['company'] = $company->name;
            $company_files = Page::where('parent_id', $company->id)
            ->where('year', 'like', date("Y"))
            ->where('Active', 1)
            ->orderBy('publish_date', 'DESC')
            ->get();
            $files = array();
            foreach($company_files as $p) {
                $file_type = $p['file_type'];
                $files[$file_type][] = $p;
            }
            if(array_key_exists('first',$files))
            $res['first'] = $files['first'][0];
            if(array_key_exists('final',$files))
            $res['final'] = $files['final'][0];
            if(array_key_exists('first_quarter',$files))
            $res['first_quarter'] = $files['first_quarter'][0];
            if(array_key_exists('half',$files))
            $res['half'] = $files['half'][0];
            if(array_key_exists('third_quarter',$files))
            $res['third_quarter'] = $files['third_quarter'][0];
            if(array_key_exists('emergency',$files))
            $res['emergency'] = $files['emergency'][0];
            if(array_key_exists('public_bodies',$files))
            $res['public_bodies'] = $files['public_bodies'][0];
            if(array_key_exists('annual_report',$files))
            $res['annual_report'] = $files['annual_report'][0];

            array_push($disclosure_table, $res);
        }
        //?????????? ?????????????? 
        $company_news = Page::where('parent_id', '894')->paginate(10);
        //??????????????????
        //$disclosures = Page::where('parent_id', '901')->where('Active', '1')->paginate(10);
        //????????????
        //$banks = Page::where('parent_id', '903')->where('Active', '1')->paginate(10);
        //???????????????? ??????????????
        $reports = Page::where('parent_id', '3984')->where('Active', '1')
        ->orderBy('year', 'DESC')->orderBy('publish_date', 'DESC')
        ->orderBy('the_order', 'DESC')->orderBy('id', 'DESC')->limit(1)->get();
        //?????????? ??????????????
        $awareness = Page::where('parent_id', '990')->where('Active', '1')
        ->orderBy('the_order', 'DESC')->orderBy('id', 'DESC')->paginate(10);
        //???????????????? ???????????? ????????????
        $general_assembly_meetings = Page::where('parent_id', '3695')->where('Active', '1')->get();
        //?????????????????? ?????????????????? ??????????????????
        $regulations = Page::whereIn('parent_id', array(919, 1000))
        ->where(function ($q) {
            $q->where('src_1', '<>', '')->orWhere('src_1_en', '<>', '');
        })
        ->where('Active', '1')->orderBy('id', 'DESC')->paginate(10);
        //?????????? ??????????????
        $prospectuses = Page::where('parent_id', '900')->where('Active', '1')
        ->orderBy('the_order', 'DESC')->orderBy('id', 'DESC')->paginate(10);
        // ?????????????? ?????????????? ????????????????
        $stock_announcements = Page::where('parent_id', '7063')->get();
        //????????????
        $info_on_fly = Page::where('parent_id', '9273')->where('Active', '1')->paginate(10);

        if($reports && $awareness && $company_news && $regulations && $prospectuses && $stock_announcements && $info_on_fly)
        {
            return response()->json([
                'status' => 'success',
                'data' => [
                    'company_news' => $company_news,
                    'image' => 'http://scfms.sy/images/back-2.jpg',
                    'disclosures' => $disclosure_table,
                    'annual_report' => $reports,
                    'awareness_prospectus' => $awareness,
                    'general_assembly_meetings' => $general_assembly_meetings,
                    'regulations_and_decisions' => $regulations,
                    'prospectuses' => $prospectuses,
                    'joint_stock_announcements' => $stock_announcements,
                    'information_on_fly' => $info_on_fly,
                ]
            ]);
        } else{
            return response()->json([
                'status' => 'error',
                'message' => 'something error'
            ]);
        }
    }
    public function show($id)
    {
        try {
            $page = Page::findOrFail($id);
            return response()->json([
                'status' => 'success',
                'data' => $page
            ]);
        } catch(\Exception $ex){
            return response()->json([
                'status' => 'error',
                'message' => 'something error'
            ]);
        }

    }
    public function search(Request $request)
    {
        try {
            $search = $request->input('search');
            $news = Page::where('Active', 1)
            ->whereIn('parent_id', [894, 895, 998])
            ->where(function ($q) use($search) {
                $q->where('name', 'LIKE', "%{$search}%")
                ->orWhere('name_en', 'LIKE', "%{$search}%");
            })
            ->orderBy('the_order', 'DESC')
            ->orderBy('id', 'DESC')
            ->paginate(10);
            $news->map(function($n){
                return [
                    'id' => $n->id,
                    'name' => $n->name,
                    'cleanurl' => $n->cleanurl,
                    'name_en' => $n->name_en,
                    'cleanurl_en' => $n->cleanurl_en,
                    'text' => $n->text,
                    'text_en' => $n->text_en,
                    'description' => $n->description,
                    'description_en' => $n->description_en
                ];
            });
            return response()->json([
                'status' => 'success',
                'data' => $news
            ]);
        } catch(\Exception $ex){
            return response()->json([
                'status' => 'error',
                'message' => 'something error'
            ]);
        }
    }

}
