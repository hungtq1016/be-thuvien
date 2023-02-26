<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    public function searchImage(Request $request){
        $search = $request->q;
        $model = $request->m;
        $type = $request->t;
        if (!$model) {
           return response()->json(['error'=>'Thiếu Model']);
        }
        if ($type == 'less') {
            return DB::table($model)->where('name', 'LIKE','%'.$search.'%')->take(5)->get();
        }

    }

}
