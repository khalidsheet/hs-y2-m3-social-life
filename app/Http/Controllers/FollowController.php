<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class FollowController extends Controller
{
    public function acceptIncomingFollowRequest(Request $request)
    {
        $user = auth()->user();
        $userToAccept = User::findOrFail($request->user_id);
        $user->acceptFollowRequest($userToAccept);
        cache()->forget("app.followers");
        return back();
    }

    public function declineIncomingFollowRequest(Request $request)
    {
        $user = auth()->user();
        $userToDecline = User::findOrFail($request->user_id);
        $user->declineFollowRequest($userToDecline);
        cache()->forget("app.followers");

        return back();
    }

    public function cancelOutgoingRequest(Request $request)
    {

        $user = auth()->user();
        $userToDecline = User::findOrFail($request->user_id);
        $user->cancelOutgoingFollowRequest($userToDecline);
        cache()->forget("app.followers");

        return back();
    }

    public function followRequest(Request $request)
    {
        $user = auth()->user();
        $userToFollow = User::findOrFail($request->user_id);
        $user->follow($userToFollow);
        cache()->forget("app.followers");
        return back();
    }
}
