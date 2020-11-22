<?php

namespace App\Http\Controllers;

use App\Department;
use App\Mail\ContactEmail;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class StoreController extends Controller
{
    public function getProducts()
    {
        $products = Product::with('department')->get();

        return $products;
    }

    public function contact()
    {
        $departments = Department::all();
        return view('emails.contact', compact('departments'));
    }

    public function contactSend( Request $request )
    {
        $name = $request->get('name');
        $email = $request->get('email');
        $content = $request->get('content');
        Mail::to('mailpruebacursophp@gmail.com')->send(new ContactEmail($name, $email, $content));
        return response()->json('',200);
    }
}
