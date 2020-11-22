<?php

namespace App\Mail;

use App\Customer;
use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendEmailTest extends Mailable
{
    use Queueable, SerializesModels;

    protected $user;
    protected $customer;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct( User $user, Customer $customer )
    {
        $this->user = $user;
        $this->customer = $customer;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('info@organic.com')
            ->view('emails.test')
            ->subject('Correo de contacto')
            ->attach(public_path().'/exports/users.xlsx', [
                'as' => 'users.xlsx',
                'mime' => 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
            ])
            ->with([
                'user' => $this->user,
                'customer' => $this->customer,
            ]);
    }
}
