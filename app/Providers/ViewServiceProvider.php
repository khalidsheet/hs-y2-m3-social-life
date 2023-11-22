<?php

namespace App\Providers;

use App\Models\Follow;
use App\Models\User;
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
            if (!auth()->check()) {
                return redirect()->route('login');
            }

            $followers = auth()->user()->followers();
            $sentFollowRequests = auth()->user()->sentFollowRequests();
            $followRequests = auth()->user()->followRequests();

            $view->with(compact('followers', 'sentFollowRequests', 'followRequests'));
        });
    }
}
