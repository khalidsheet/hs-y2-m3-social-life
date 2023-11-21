<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;

class HomeController extends Controller
{
    public function index()
    {
        $followings = User::find(auth()->user()->id)->followings()->pluck('following_id')->toArray();

        $posts = Post::query()
            ->with(['media', 'user'])
            ->whereIn('user_id', [...$followings, auth()->user()->id])
            ->orderBy("updated_at", "desc")
            ->paginate(40);


        return view("welcome", compact("posts"));
    }
}
