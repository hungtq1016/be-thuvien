<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

class DbController extends Controller
{
    public function index(Request $request)
    {
        // DB::table($request->value);
        $plural = Str::plural($request->value);
        $columns = Schema::getColumnListing($plural); // users table
        return response($columns);
    }
}
