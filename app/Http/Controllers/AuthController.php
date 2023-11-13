<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{

    public function showLogin()
    {
        return view("auth.login");
    }

    public function login(Request $request)
    {
        $this->validate($request, [
            "email" => "required|email|exists:users",
            "password" => "required|string",
        ]);

        $user = $request->user();
        if ($user->password != $request->password) {
            return response()->json([
                "status" => "error",
                "message" => "
                "
            ], 0);
        }
    }
}
