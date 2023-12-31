<?php

namespace App\Http\Controllers;

use App\Models\User;

class UserController extends Controller
{
    public function getPeople()
    {
        $people = User::whereNotIn('id', function ($query) {
            $query->select('follower_id')
                ->from('follows')
                ->where('follower_id', '<>', auth()->id());
        })
            ->where('id', '<>', auth()->id())
            ->inRandomOrder()
            ->paginate(40);

        return view("people", compact("people"));
    }
}
