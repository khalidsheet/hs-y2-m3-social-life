<?php

namespace App\Providers;

use App\Models\Follow;
use Illuminate\Support\ServiceProvider;
use View;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        View::composer('components.app-layout', function ($view) {
            $followers = Follow::where('follower_id', '<>', auth()->user()->id)->where('is_accepted', 1)->with('follower')->get();
            $sentFollowRequests = Follow::query()
                ->where('follower_id', auth()->user()->id)
                ->where('following_id', '<>', auth()->user()->id)
                ->where('is_accepted', 0)
                ->with('following')
                ->get();

            $followRequests = Follow::query()
                ->where('follower_id', '<>', auth()->user()->id)
                ->where('following_id', auth()->user()->id)
                ->where('is_accepted', 0)
                ->with('following')
                ->get();

            $view->with(compact('followers', 'sentFollowRequests', 'followRequests'));
        });
    }
}
