<?php

namespace App\Models;

use Cache;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    public static function booted()
    {
        static::created(function () {
            Cache::forget('home.posts' . auth()->id());
            Cache::forget('public.explore' . auth()->id());
        });
    }
}
