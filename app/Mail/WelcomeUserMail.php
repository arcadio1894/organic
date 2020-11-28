<?php

namespace App\Mail;

use App\Department;
use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class WelcomeUserMail extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $departments;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct( User $user, Collection $departments )
    {
        $this->user = $user;
        $this->departments = $departments;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('info@organic.com')
            ->view('emails.welcomeUser')
            ->subject('Bienvenido Organic')
            ->with([
                'user' => $this->user,
                'departments' => $this->departments,
            ]);
    }
}
