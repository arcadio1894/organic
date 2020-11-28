<?php

namespace App\Listeners;

use App\Events\UserRegistered;
use App\Mail\UserRegisteredMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendEmailAdmin
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
        Mail::to('joryes1894@gmail.com')->send(new UserRegisteredMail($event->user));
        logger('Email enviado...');
    }
}
