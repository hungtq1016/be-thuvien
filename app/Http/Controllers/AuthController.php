<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Traits\HttpResponses;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\LoginUserRequest;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    use HttpResponses;

    public function admin_login(LoginUserRequest $request)
    {
        $request->validated($request->all());

        if (!Auth::attempt($request->only(['email','password']))) {
            return $this->error('','Not match',401);
        }
        $user = User::where('email',$request->email)->first();

        return $this->success([
            'name' => $user->name,
            'email' => $user->email,
            'role' => $user->role,
            'id'=>$user->id,
            'token' => $user->createToken('API Token of '.$user->name)->plainTextToken
         ]);
    }

    public function register(StoreUserRequest $request)
    {
        $request->validated($request->all());

        $user= User::create([
            'name' => $request->name,
            'email' => $request->email,
            'role_id'  => 2,
            'password' => Hash::make($request->password),

        ]);

        return $this->success([
            'name' => $user->name,
            'email' => $user->email,
            'role' => $user->role->id,
            'id'=>$user->id,
            'token' => $user->createToken('API Token of '.$user->name)->plainTextToken
        ]);
    }

    public function logout()
    {
        Auth::user()->currentAccessToken()->delete();

        return $this->success([
            'message' => 'Đăng xuất thành công'
        ]);

    }
}
