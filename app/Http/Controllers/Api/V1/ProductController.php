<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

use App\Http\Resources\V1\ProductResource;
use App\Http\Resources\V1\ProductCollection;
use Illuminate\Support\Facades\File;
use Storage;

class ProductController extends Controller
{

    public function index()
    {
        return new ProductCollection(Product::All());
    }


    public function store(Request $request)
    {
        $fileName = '';

        if($request->hasFile('image')){
            $fileName = $request->file('image')->store('public/productsImages');
        } else {
            $fileName = null;
        }

        $Product = Product::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'image' => $fileName,
            'categorie_id'=>$request->categorie_id,
        ]);
        return new ProductResource($Product);
    }


    public function show(Product $product)
    {
        return new ProductResource($product);
    }


    public function update(Request $request, Product $product)
    {
        $fileName = '';

        if($request->hasFile('image')){
            if(Storage::exists($product->image)){
                Storage::delete($product->image);
            }

            $fileName=$request->file('image')->store('public/productsImages');
        } else {
            // $fileName=$request->image;
            $fileName=$product->image;
        }

        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->image = $fileName;
        $product->save();

        return new ProductResource($product);
    }


    public function destroy(Product $product)
    {
        $product->delete();
        if(Storage::exists($product->image)){
            Storage::delete($product->image);
        }

        return response()->json([
            'message' => 'Success',
        ], 403);
    }


    public function image(Request $request)
    {
        return $request->file('image')->store('public/imageTest');
    }
}
