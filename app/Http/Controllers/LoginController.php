<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\LoginRequest;

class LoginController extends Controller
{
    public function login(LoginRequest $request)
    {
        if($request->validated()){
            if(Auth::attempt([ 'email' => $request->email, 'password' => $request->password])) {
                $user = Auth::user();
                $token = $user->createToken('token')->accessToken;

                return response()->json([
                    'status' => 'success',
                    'success' => true,
                    'token' => $token,
                    'data' => $user
                ]);
            }
            else{
                return response()->json([
                    'status' => 'failed',
                    'success' => false,
                    'message' => 'Invalid credentials entered']);
            }
        }
    }
}
