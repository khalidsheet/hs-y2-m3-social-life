<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
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
        return redirect()->back()->with('success');
    }
}
