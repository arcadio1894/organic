<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Mail\SendEmailTest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function sendEmail()
    {
        $user = User::find(8);
        $customer = Customer::where('user_id', $user->id)->first();

        Mail::to($user->email)->send(new SendEmailTest($user, $customer));


    }
}
