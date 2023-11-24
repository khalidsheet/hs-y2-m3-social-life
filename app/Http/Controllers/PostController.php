<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "content" => "nullable|string",
            "image" => "nullable|image|required_if:content,null",
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $post = new Post();

        if ($request->has("content")) {
            $post->content = $request->content;
        }

        if ($request->hasFile("image")) {
            $post->addMediaFromRequest('image')->toMediaCollection();
        }

        $post->user_id = auth()->id();

        $post->save();
        Cache::forget('home.posts');

        return redirect()->back()->with('success');
    }

    public function getPostDetails(Request $request, int $id)
    {
        $post = Post::query()->with([
            'media',
            'user',
            'likes' => function ($query) {
                $query->limit(2)->latest();
            },
            'comments' => function ($query) {
                $query->with('user')->latest();
            }
        ])
            ->withCount('likes', 'comments')->findOrFail($id);

        return view('post.details', ['post' => $post]);
    }

    public function getExplore()
    {
        $posts = Cache::remember('public.explore', 3600, function () {
            return Post::query()
                ->with([
                    'media',
                    'user',
                    'likes' => function ($query) {
                        $query->limit(2)->latest();
                    },
                ])
                ->withCount('likes', 'comments')
                ->orderBy("updated_at", "desc")
                ->paginate(40);
        });


        return view("explore", compact("posts"));
    }
}
