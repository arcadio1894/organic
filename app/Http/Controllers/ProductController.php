<?php

namespace App\Http\Controllers;

use App\Department;
use App\Http\Requests\StoreProduct;
use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('department')->get();
        $departments = Department::all();
        return view('product.index', compact('products', 'departments'));
    }

    public function create()
    {
        //
    }

    public function store(StoreProduct $request)
    {
        if(!$request->validator->fails()){
            //Guardar el producto
            $product = Product::create([
                'name'              => $request->get('name'),
                'descriptionShort'  => $request->get('descriptionShort'),
                'descriptionLarge'  => $request->get('descriptionLarge'),
                'unitsInStock'      => $request->get('unitsInStock'),
                'unitPrice'         => $request->get('unitPrice'),
                'stars'             => $request->get('stars'),
                'weight'            => $request->get('weight'),
                'department_id'     => $request->get('department_id'),
            ]);

            // Tratamiento de la imagen sin Intervation Image
            if(!$request->file('image')){
                $product->image = 'not-found.jpg';
            } else {
                $path = public_path().'/images/products/';
                $extension = $request->file('image')->getClientOriginalExtension();
                $filename = $product->id . '.' . $extension;
                $request->file('image')->move($path, $filename);
                $product->image = $filename;
                $product->save();
            }
        }

        return response()->json($request->validator->messages(), 200);
    }

    public function show(Product $product)
    {
        //
    }

    public function edit(Product $product)
    {
        //
    }

    public function update(Request $request, Product $product)
    {
        //
    }

    public function destroy(Product $product)
    {
        //
    }
}
