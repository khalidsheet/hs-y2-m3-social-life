<?php

namespace App\Http\Controllers;

use App\Models\Like;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    public function like(Request $request)
    {

        $like = Like::where("user_id", auth()->id())->where('post_id', $request->post_id)->first();

        if ($like) {
            $like->delete();

            return redirect()->to(url()->previous() . "#post-$request->post_id");
        }

        $like = new Like();
        $like->post_id = $request->post_id;
        $like->user_id = auth()->id();

        if ($like->save()) {
            return redirect()->to(url()->previous() . "#post-$request->post_id");
        }
    }
}
