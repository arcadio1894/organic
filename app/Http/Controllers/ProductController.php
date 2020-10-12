<?php

namespace App\Http\Controllers;

use App\Department;
use App\Http\Requests\DeleteProduct;
use App\Http\Requests\StoreProduct;
use App\Http\Requests\UpdateProduct;
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

    public function update(UpdateProduct $request)
    {
        if(!$request->validator->fails()){
            //Guardar el producto
            $product = Product::find($request->get('product_id'));
            $product->name              = $request->get('name');
            $product->descriptionShort  = $request->get('descriptionShort');
            $product->descriptionLarge  = $request->get('descriptionLarge');
            $product->unitsInStock      = $request->get('unitsInStock');
            $product->unitPrice         = $request->get('unitPrice');
            $product->stars             = $request->get('stars');
            $product->weight            = $request->get('weight');
            $product->department_id     = $request->get('department_id');
            $product->save();

            // Tratamiento de la imagen sin Intervation Image
            if($request->file('image'))
            {
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

    public function destroy(DeleteProduct $request)
    {
        if(!$request->validator->fails()){
            //Eliminar el producto
            $product = Product::find($request->get('product_id'));
            $product->delete();
        }

        return response()->json($request->validator->messages(), 200);
    }

    public function getProduct( $id )
    {
        $product = Product::where('id',$id)->with('department')->get();
        return $product;
    }
}
