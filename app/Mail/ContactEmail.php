<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactEmail extends Mailable
{
    use Queueable, SerializesModels;

    protected $name;
    protected $email;
    protected $content;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct( $name, $email, $content )
    {
        $this->name = $name;
        $this->email = $email;
        $this->content = $content;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('info@organic.com')
            ->view('emails.contact_email')
            ->subject('Correo de contacto')
            ->with([
                'name' => $this->name,
                'email' => $this->email,
                'content' => $this->content,
            ]);
    }
}
