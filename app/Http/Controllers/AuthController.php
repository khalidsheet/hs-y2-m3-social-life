<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use Validator;

class AuthController extends Controller
{

    public function showLogin()
    {
        return view("auth.login");
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "email" => "required|email|exists:users",
            "password" => "required|string"
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors())->withInput();
        }

        $credentials = $request->only("email", "password");


        if (Auth::attempt($credentials)) {
            return redirect()->intended('/');
        }

        return back()->withErrors('email', 'Invalid Credentials');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
