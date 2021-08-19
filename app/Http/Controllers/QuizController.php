<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Page;
use DB;

class QuizController extends Controller
{
    public function quiz()
    {
        try {
            $questions = Page::where('parent_id', 1007)
            ->orderBy('the_order', 'ASC')
            ->orderBy('id', 'DESC')->get();
            return response()->json([
                'status' => 'success',
                'data' => $questions
            ]);
        } catch(\Exception $ex){
            return response()->json([
                'status' => 'error',
                'message' => 'something error'
            ]);
        }
    }
    public function result(Request $request)
    {
        try{
            $name = $request->name;
            //$timer = ;
            $grade = 0;
            $ans = $request->answers;
            $questions = array();
            foreach($ans as $key=>$value)
            {
                $option = Page::where('id', $value)->first();
                if($option->is_right == 1) $grade+=1;
                $questions[$key]=$value;
            }
            $questions = json_encode($questions);
            $res = DB::table('t_results')->insert(
                ['name' => $name, 'the_grade' => $grade, 'questions' => $questions]
            );
            if($res)
            {
                return response()->json([
                    'status' => 'success',
                    'message' => 'success'
                ]);
            }
        } catch(\Exception $ex){
            return response()->json([
                'status' => 'error',
                'message' => 'something error'
            ]);
        }
    }
}
