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
            "content" => "required|string",
            "image" => "nullable|image",
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $post = new Post();
        $post->content = $request->content;

        if ($request->hasFile("image")) {
            $post->addMediaFromRequest('image')->toMediaCollection();
        }

        $post->user_id = auth()->id();

        $post->save();
        return redirect()->back()->with('success');
    }
}
