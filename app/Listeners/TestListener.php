<?php

namespace App\Listeners;

use App\Events\TestEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class TestListener
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
     * @param  TestEvent  $event
     * @return void
     */
    public function handle(TestEvent $event)
    {
        logger('Notificar al administrador que se esta realizando un envio - '.$event->user);
        logger('Notificar el cliente con un email - '.$event->user);
    }
}
