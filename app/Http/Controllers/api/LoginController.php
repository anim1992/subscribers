<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Auth;
class LoginController extends Controller
{
    public function login(Request $request)
    {
        $credendials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
        if(Auth::attempt($credendials))
        {
            $accessToken = Auth::user()->createToken('Laravel-test')->accessToken;
            return response(['user' => Auth::user(), 'access_token' => $accessToken]);
        }
        else
        {
            return response(['message' => 'Invalid Credendials']);    
        }
    }
}
