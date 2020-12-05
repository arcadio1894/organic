<?php

namespace App\Http\Controllers;

use App\Cart;
use App\CartProduct;
use App\Customer;
use App\Department;
use App\Events\TestEvent;
use App\Mail\ContactEmail;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

    public function cart( Request $request )
    {
        $customer = Customer::where('user_id', Auth::user()->id)->first();
        $product = Product::find($request->get('product'));
        $departments = Department::all();

        // TODO: Obtener el ultimo carrito del cliente
        $lastCartOn = Cart::where('customer_id', $customer->id)->latest()->first();

        if ($lastCartOn != null)
        {
            if ( $lastCartOn->active == 'off' )
            {
                // TODO: Se encarga de crear un carrito si el carrito anterior está en off
                $cart = Cart::create([
                    'active' => 'on',
                    'state' => 'Updating',
                    'customer_id' => $customer->id
                ]);

                $cart_product = CartProduct::create([
                    'cart_id' => $cart->id,
                    'product_id' => $product->id,
                    'quantity' => $request->get('quantity'),
                    'price' => $product->unitPrice,
                ]);
                return response()->json(['url'=> route('shopping.cart')],200);

            } else {
                // TODO: Si el carrito esta en on, solo va a agregar a cart_products
                $repeatProduct = CartProduct::where('product_id', $product->id)->first();
                //var_dump($repeatProduct);
                if ($repeatProduct == null)
                {
                    $cart_product = CartProduct::create([
                        'cart_id' => $lastCartOn->id,
                        'product_id' => $product->id,
                        'quantity' => $request->get('quantity'),
                        'price' => $product->unitPrice,
                    ]);
                    return response()->json(['url'=> route('shopping.cart')],200);
                }
                return response()->json(['error' => 'Este producto ya esta agregado al carrito.'],200);
            }
        } else {
            // TODO: Se encarga de crear un carrito si el carrito anterior está en off
            $cart = Cart::create([
                'active' => 'on',
                'state' => 'Updating',
                'customer_id' => $customer->id
            ]);

            $cart_product = CartProduct::create([
                'cart_id' => $cart->id,
                'product_id' => $product->id,
                'quantity' => $request->get('quantity'),
                'price' => $product->unitPrice,
            ]);
            return response()->json(['url'=> route('shopping.cart')],200);

        }

        //return response()->json(['url'=> route('shopping.cart', ['id' => $lastCartOn ])],200);
    }

    public function deleteDetail( Request $request )
    {
        //var_dump($request->get('product'));
        // TODO: Obtener el cart_detail para eliminar
        $cart = Cart::where('id', $request->get('cart'))
            ->where('active', 'on')
            ->where('state', 'Updating')->first();
        if ($cart != null)
        {
            $cartDetail = CartProduct::where('cart_id', $request->get('cart'))
                ->where('product_id', $request->get('product'))->first();
            if ($cartDetail != null)
            {
                $cartDetail->delete();
                return response()->json('',200);
            } else {
                return response()->json(['error' => 'Error al eliminar el detalle.'],200);
            }
        } else {
            return response()->json(['error' => 'El carrito no esta activo ni en modifcación.'],200);
        }

    }

    public function modifyQuantity( Request $request )
    {
        //var_dump($request->get('product'));
        // TODO: Obtener el cart_detail para eliminar
        $cart = Cart::where('id', $request->get('cart'))
            ->where('active', 'on')
            ->where('state', 'Updating')->first();
        if ($cart != null)
        {
            $cartDetail = CartProduct::where('cart_id', $request->get('cart'))
                ->where('product_id', $request->get('product'))->first();
            if ($cartDetail != null)
            {
                $cartDetail->quantity = $request->get('quantity');
                $cartDetail->save();
                return response()->json('',200);
            } else {
                return response()->json(['error' => 'Error al modificar el detalle.'],200);
            }
        } else {
            return response()->json(['error' => 'El carrito no esta activo ni en modifcación.'],200);
        }

    }

    public function shoppingCart()
    {
        $customer = Customer::where('user_id', Auth::user()->id)->first();
        $cart = Cart::where('customer_id', $customer->id)->where('active', 'on')->latest()->first();
        //dd($cart->products[0]->pivot->price);
        $departments = Department::all();
        $total = 0;
        foreach ( $cart->products as $detail)
        {
            $total+=($detail->pivot->price*$detail->pivot->quantity);
        }
        return view('store.shopping-cart', compact('departments', 'cart', 'total'));
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
