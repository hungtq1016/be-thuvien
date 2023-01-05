<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class DbController extends Controller
{
    public function index(Request $request)
    {
        // DB::table($request->value);
        $columns = Schema::getColumnListing($request->value); // users table
        return response($columns);
    }
}
