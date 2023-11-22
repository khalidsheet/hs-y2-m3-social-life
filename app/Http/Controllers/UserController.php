<?php

namespace App\Http\Controllers;

use App\Models\User;

class UserController extends Controller
{
    public function getPeople()
    {
        $people = User::query()
            ->select("id", "name", "image_url", "created_at")
            ->whereNot("id", auth()->user()->id)
            ->inRandomOrder()
            ->paginate(40);


        return view("people", compact("people"));
    }
}
