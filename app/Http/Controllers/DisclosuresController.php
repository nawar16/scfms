<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Page;
use App\Models\Info;
use App\Models\Managment;

class DisclosuresController extends Controller
{
    public function index()
    {
        try {
            $disclosure = Page::where('parent_id', '901')
            ->orderBy('the_order', 'ASC')->orderBy('id', 'DESC')->get();
            $disclosure = $disclosure->map(function($dis){
                $data = Page::where('parent_id', $dis->id)->get();
                $data = $data->map(function($d){
                    return [
                        'id' => $d->id,
                        'name' => $d->name,
                        'cleanurl' => $d->cleanurl,
                        'name_en' => $d->name_en,
                        'cleanurl_en' => $d->cleanurl_en,
                        'text' => $d->text,
                        'text_en' => $d->text_en
                    ];
                });
                return [
                    'id' => $dis->id,
                    'name' => $dis->name,
                    'cleanurl' => $dis->cleanurl,
                    'name_en' => $dis->name_en,
                    'cleanurl_en' => $dis->cleanurl_en,
                    'text' => $dis->text,
                    'text_en' => $dis->text_en,
                    'data' => $data
                ];
            });
            return response()->json([
                'status' => 'success',
                'data' => $disclosure
            ]);
        } catch(\Exception $ex){
            return response()->json([
                'status' => 'error',
                'message' => 'something error'
            ]);
        }

    }
    public function company($id)
    {
        try{
            $ans = array();
            for( $y=2006; $y<=2021; $y++){
                $company_files = Page::where('parent_id', $id)
                ->where('year', 'like', $y)
                ->where('Active', 1)
                ->orderBy('publish_date', 'DESC')
                ->get();
                $files = array();
                $res = array();
                foreach($company_files as $p) {
                    $files[$p['file_type']][] = $p;
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

                $ans[$y] = $res;
            }
            return response()->json([
                'status' => 'success',
                'data' => $ans
            ]);
        } catch(\Exception $ex){
                return response()->json([
                    'status' => 'error',
                    'message' => 'something error'
                ]);
            }
    }
    public function company_info($id)
    {
        try{
            $tables = array();
            $info = Info::where('parent_id', $id)->first();
            $tables['company_information'] = $info;
            $info = Managment::where('parent_id', $id)->get();
            $tables['board_of_directors'] = $info;
            return response()->json([
                'status' => 'success',
                'data' => $tables
            ]);
        } catch(\Exception $ex){
                return response()->json([
                    'status' => 'error',
                    'message' => 'something error'
                ]);
            }
    }
}

