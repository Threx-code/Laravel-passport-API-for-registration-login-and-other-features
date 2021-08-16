<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\RegistrationRequest;
use App\Models\User;

class RegisterController extends Controller
{
    public function register(RegistrationRequest $request)
    {
        if($request->validated()){
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password)
            ]);

            return response()->json([
                'status' => 201,
                'success' => true,
                'data' => $user
            ]);


        }
    }
}
