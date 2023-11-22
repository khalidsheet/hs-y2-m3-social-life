<?php

namespace App\Listeners;

use App\Events\UserRegistered;
use App\Mail\AccountVerification;
use URL;
use Mail;

class SendUserRegisteredEmail
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(UserRegistered $event): void
    {
        $user = $event->user;
        $token = URL::temporarySignedRoute('auth.verify', now()->addHours(2), ['payload' => encrypt($user->email)], true);
        Mail::to($user->email)->send(new AccountVerification($user, $token));
    }
}
