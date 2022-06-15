<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Model\User;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request){
        $this->validateLogin($request);

        // login true
        if(Auth::attempt($request->only('email', 'password'))){
            return response()->json([
                'token'=> $request->user()->createToken($request->name)->plainTextToken,
                'message'=>'success',
            ]);
            // login false
            return response()->json([
                'message' => 'unauthorized',
            ], 401);
        }

    }

    public function validateLogin(Request $request){
        return $request->validate([
            'email' => 'required|email',
            'password' => 'required',
            'name' => 'required',
        ]);
    }
}
