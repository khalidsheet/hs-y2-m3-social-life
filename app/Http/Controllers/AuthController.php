<?php

namespace App\Http\Controllers;

use App\Events\UserRegistered;
use App\Mail\AccountVerification;
use App\Models\User;
use Auth;
use Hash;
use Illuminate\Http\Request;
use Mail;
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

    public function showRegister()
    {
        return view("auth.register");
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "name" => "required|string",
            "email" => "required|email|unique:users",
            "password" => "required|string"
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors())->withInput();
        }

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->image_url = fake()->imageUrl(150, 150);

        $verificationPayload = encrypt($user);

        if ($user->save()) {
            UserRegistered::dispatch($user);
            return redirect()->route("auth.verify-account", ["payload" => $verificationPayload]);
        }

        return back()->withErrors('email', 'Invalid Credentials');
    }

    public function verifyAccount(Request $request)
    {
        $query = $request->query();
        $email = decrypt($query['payload']);

        $user = User::where('email', $email)->firstOrFail();

        $user->email_verified_at = now();
        $user->update();

        if (Auth::loginUsingId($user->id)) {
            return redirect()->route('home')->with('success', 'Verification Success!');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
