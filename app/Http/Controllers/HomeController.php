<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;

class HomeController extends Controller
{
    public function index()
    {
        $followings = User::find(auth()->user()->id)->followings()->pluck('follower_id')->toArray();


        $posts = Post::query()
            ->with([
                'media',
                'user',
                'likes' => function ($query) {
                    $query->limit(2)->latest();
                },
            ])
            ->withCount('likes', 'comments')
            ->whereIn('user_id', [...$followings, auth()->user()->id])
            ->orderBy("updated_at", "desc")
            ->paginate(40);


        return view("welcome", compact("posts"));
    }
}
