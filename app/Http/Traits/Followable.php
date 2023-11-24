<?php

namespace App\Http\Traits;

use App\Models\Follow;
use Illuminate\Database\Eloquent\Model;

trait Followable
{

    public function follow(Model $model)
    {
        $follow = new Follow();
        $follow->follower_id = $model->id;
        $follow->following_id = $this->id;
        return $follow->save();
    }

    public function unfollow(Model $model, bool $forceUnfollow = true)
    {
        return Follow::query()
            ->where("follower_id", $this->id)
            ->where("following_id", $model->id)
            ->when($forceUnfollow, function ($query) {
                $query->whereNotNull("accepted_at");
            })
            ->forceDelete();
    }

    public function declineFollowRequest(Model $model)
    {
        return $this->unfollow($model, false);
    }

    public function acceptFollowRequest(Model $model)
    {
        return Follow::query()
            ->where("follower_id", $this->id)
            ->where("following_id", $model->id)
            ->whereNull("accepted_at")
            ->update(["accepted_at" => now()]);
    }

    public function cancelOutgoingFollowRequest(Model $model)
    {
        return Follow::query()
            ->where("following_id", $this->id)
            ->where("follower_id", $model->id)
            ->whereNull("accepted_at")
            ->forceDelete();
    }


    public function isFollowing(Model $model)
    {
        return Follow::query()
            ->where("following_id", $this->id)
            ->where("follower_id", $model->id)
            ->whereNotNull("accepted_at")
            ->exists();
    }

    public function followRequests()
    {
        return Follow::query()
            ->where('follower_id', $this->id)
            ->where('following_id', '<>', $this->id)
            ->whereNull('accepted_at')
            ->with('following', 'follower')
            ->get();
    }

    public function sentFollowRequests()
    {
        return Follow::query()
            ->where('follower_id', '<>', $this->id)
            ->where('following_id', $this->id)
            ->whereNull('accepted_at')
            ->with('follower')
            ->get();
    }

    public function followers()
    {
        return Follow::query()
            ->where('follower_id', $this->id)
            ->where('following_id', '<>', $this->id)
            ->whereNotNull('accepted_at')
            ->with('following')
            ->get();
    }

    public function followings()
    {
        return Follow::query()
            ->where('following_id', '<>', $this->id)
            ->where('follower_id', $this->id)
            ->whereNotNull('accepted_at')
            ->with('follower')
            ->get();
    }
}
