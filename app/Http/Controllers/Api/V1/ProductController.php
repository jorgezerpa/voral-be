<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

use App\Http\Resources\V1\ProductResource;
use App\Http\Resources\V1\ProductCollection;


class ProductController extends Controller
{

    public function index()
    {
        return new ProductCollection(Product::All());
    }


    public function store(Request $request)
    {
        $Product = Product::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'image' => $request->image,
            'categorie_id'=>$request->categorie_id,
        ]);
        return new ProductResource($product);
    }


    public function show(Product $product)
    {
        return new ProductResource($product);
    }


    public function update(Request $request, Product $product)
    {
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->image = $request->image;
        $product->save();

        return new ProductResource($product);
    }


    public function destroy(Product $product)
    {
        $product->delete();
        return response()->json([
            'message' => 'Success',
        ], 204);
    }


    public function image(Request $request)
    {
        return $request->file('image')->store('public/imageTest');
    }
}
