<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Foundation\Console\PackageDiscoverCommand;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function register(Request $request){
        $validataedData = $request->validate([
            'name' => 'required|max:55',
            'email' => 'email|required|unique:users',
            'password'=>'required|confirmed'
        ]);

        $validataedData['password'] = bcrypt($request->password);

        $user = User::create($validataedData);

        $accessToken = $user->createToken('authToken')->accessToken;

        return response(['user'=> $user, 'access_token'=>$accessToken]);
    }

    public function login(Request $request){
        $loginData = $request->validate([
            'email'=>'email|required',
            'password'=>'required'
        ]);

        if(!auth()->attempt($loginData))
            return response(['message'=>'Invalid credentials']);

        $accessToken = auth()->user()->createToken('authToken')->accessToken;
        return response(['user'=>auth()->user(), 'access_token'=>$accessToken]);
    }
}
