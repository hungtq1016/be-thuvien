<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $result = $request->limit ?
        DB::table($request->type)->where('name', 'like', '%'.$request->q.'%')->limit($request->limit)
        ->get()
        :
        DB::table($request->type)->where('name', 'like', '%'.$request->q.'%')
        ->get();
        return $result;
    }

}
