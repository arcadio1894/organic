<?php

namespace App\Listeners;

use App\Events\UserRegistered;
use App\Mail\WelcomeUserMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendEmailUser
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  UserRegistered  $event
     * @return void
     */
    public function handle(UserRegistered $event)
    {
        Mail::to($event->user->email)->send(new WelcomeUserMail($event->user, $event->departments));
        logger('Email enviado...');
    }
}
