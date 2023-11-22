<?php

namespace App\Http\Controllers;

use App\Models\User;

class UserController extends Controller
{
    public function getPeople()
    {
        $people = User::whereNotIn('id', function ($query) {
            $query->select('following_id')
                ->from('follows')
                ->where('follower_id', auth()->id())
                ->whereNotNull('accepted_at');
        })
            ->where('id', '<>', auth()->id())
            ->inRandomOrder()
            ->paginate(40);

        return view("people", compact("people"));
    }
}
