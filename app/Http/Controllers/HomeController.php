<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $posts = Post::query()
            ->with(['user', 'media'])
            ->orderBy("updated_at", "desc")
            ->paginate(40);

        // dd($posts);

        return view("welcome", compact("posts"));
    }
}
