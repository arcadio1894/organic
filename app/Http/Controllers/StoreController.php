<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Department;
use App\Events\TestEvent;
use App\Mail\ContactEmail;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class StoreController extends Controller
{
    public function shop()
    {
        $departments = Department::all();

        return view('store.shop', compact('departments'));
    }

    public function productDetail( $id )
    {
        $departments = Department::all();
        $product = Product::where('id', $id)->with('department')->first();

        return view('store.shop-detail', compact('departments', 'product'));
    }

    public function cart()
    {
        $departments = Department::all();
        //$pro
        $cart = Cart::all();

        return view('store.cart', compact('departments', 'product'));
    }

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

    public function testEvent()
    {
        // TODO: Imaginemos que es un envio de pedido
        logger('Cambiar estado del pedido');
        event( new TestEvent('Jorge Gonzales'));
        return 'Se ha realizado todo correctamente.';
    }
}
