<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Page;

class AuditorsController extends Controller
{
    public function index()
    {
        try {
            $auditor = Page::where('parent_id', '953')->paginate(10);
            $auditor['name_en'] = 'Auditors';
            $auditor['name'] = 'مدققو الحسابات ';
            $auditor['id'] = 953;
            return response()->json([
                'status' => 'success',
                'data' => $auditor
            ]);
        } catch(\Exception $ex){
            return response()->json([
                'status' => 'error',
                'message' => 'something error'
            ]);
        }

    }
}
