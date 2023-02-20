<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request)
    {
        // $this->authorize('viewAny', $user);

        return UserResource::collection(User::paginate($request->limit));
    }
}
