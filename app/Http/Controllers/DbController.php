<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

class DbController extends Controller
{
    public function index(Request $request)
    {
        $plural = Str::plural($request->value);
        $columns = Schema::getColumnListing($plural); // users table
        return response($columns);

    }

    public function index2(Request $request)
    {
        $plural = Str::plural($request->value);
        $query = "SHOW COLUMNS FROM ".$plural;
        return response(DB::select($query));
    }
}
