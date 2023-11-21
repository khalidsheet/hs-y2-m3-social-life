<?php

namespace App\Http\Controllers;

use App\Models\Follow;
use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $followings = Follow::query()
            ->where('following_id', '<>', auth()->user()->id)
            ->where('is_accepted', 1)
            ->pluck('following_id')->toArray();

        $posts = Post::query()
            ->with(['media', 'user'])
            ->whereIn('user_id', [...$followings, auth()->user()->id])
            ->orderBy("updated_at", "desc")
            ->paginate(40);


        return view("welcome", compact("posts"));
    }
}
