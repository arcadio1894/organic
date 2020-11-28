<?php

namespace App\Mail;

use App\Department;
use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CreatedDepartmentEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $department;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct( User $user, Department $department )
    {
        $this->user = $user;
        $this->department = $department;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('info@organic.com')
            ->subject('Depertamento creado')
            ->view('emails.departmentCreated');
    }
}
