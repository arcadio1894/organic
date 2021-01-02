<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index( $product_id )
    {
        $posts = Post::where('product_id', $product_id)->with('customer')->get();
        return $posts;
    }

    public function store(Request $request)
    {
        $customer = Customer::where('user_id', Auth::user()->id)->first();
        $post = new Post();
        $post->comment = $request->get('message');
        $post->customer_id = $customer->id;
        $post->product_id = $request->get('id_product');
        $post->save();
        $post1 = Post::where('id', $post->id)->with('customer')->first();
        return $post1;
    }

    public function update(Request $request, $id)
    {
        $post = Post::find($id);
        $post->comment = $request->get('message');
        $post->save();
        $post1 = Post::where('id', $post->id)->with('customer')->first();
        return $post1;
    }

    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();
    }
}
