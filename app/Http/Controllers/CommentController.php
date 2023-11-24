<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Validator;

class CommentController extends Controller
{
    public function writeComment(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "content" => "required|string",
            "post_id" => "required|numeric|exists:posts,id"
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $comment = new Comment();
        $comment->user_id = auth()->id();
        $comment->content = $request->content;
        $comment->post_id = $request->post_id;

        if ($comment->save()) {
            return back()->with("success");
        }
    }
}
