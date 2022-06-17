<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Storage;

class ProductController extends Controller
{
    public function index(){
        return view('index', [
            'products' => Product::latest()->paginate(),
        ]);
    }

    public function create(){
        return view('create');
    }

    public function store(Request $request){
        $request->validate([
            'name'=> 'required|unique:products,name',
            'description'=> 'required',
            'categorie_id'=> 'required',
            'price'=> 'required',
            'image'=> 'required',
        ]);

        $fileName = '';

        if($request->hasFile('image')){
            $fileName = $request->file('image')->store('public');
        } else {
            $fileName = null;
        }
        $Product = Product::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'image' => $request->getSchemeAndHttpHost().str_replace('public','/storage', $fileName),
            'categorie_id'=>$request->categorie_id,
        ]);
        return redirect()->route('index');
    }

    public function get(Product $product){
        return view('product', [
            'product' => $product,
        ]);
    }

    public function edit(Product $product){
        return view('edit', [
            'product' => $product,
        ]);
    }

    public function update(Product $product, Request $request){
        $request->validate([
            'name'=> 'required|unique:products,name',
            'description'=> 'required',
            'categorie_id'=> 'required',
            'price'=> 'required',
        ]);

        $fileName = '';
        if($request->hasFile('image')){
            if(Storage::exists($product->image)){
                Storage::delete($product->image);
            }
            $fileName=$request->file('image')->store('public');
        } else {
            $fileName=$product->image;
        }

        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->image = $request->hasFile('image') ? $request->getSchemeAndHttpHost().str_replace('public','/storage', $fileName) : $fileName=$product->image;
        $product->save();

        return redirect()->route('index');
    }

    public function destroy(Product $product, Request $request){
        $product->delete();
        $local = $request->getSchemeAndHttpHost();
        //public cause work on real folder, not on simbolic folder. storage/public/image->yes vs storage/image->no
        $image_name = str_replace($local.'/storage/','public/', $product->image);
        if(Storage::exists($image_name)){
                Storage::delete($image_name);
        }
        return redirect()->route('index');
    }
}

