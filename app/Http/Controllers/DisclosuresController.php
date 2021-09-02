<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Page;

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
                    $ddata = Page::where('parent_id', $d->id)->get();
                    return [
                        'id' => $d->id,
                        'name' => $d->name,
                        'cleanurl' => $d->cleanurl,
                        'name_en' => $d->name_en,
                        'cleanurl_en' => $d->cleanurl_en,
                        'data' => $ddata
                    ];
                });
                return [
                    'id' => $dis->id,
                    'name' => $dis->name,
                    'cleanurl' => $dis->cleanurl,
                    'name_en' => $dis->name_en,
                    'cleanurl_en' => $dis->cleanurl_en,
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
}
