<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function getProducts()
    {
        $products = Product::with('department')->get();

        return $products;
    }
}
