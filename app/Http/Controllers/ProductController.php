<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Categorie;
use Illuminate\Support\Facades\Auth;
use Storage;

class ProductController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request){
        if(isset($request->all()['categorie'])){
            return view('index', [
                'products' => Product::where('categorie_id', $request->all()['categorie'])->latest()->paginate(),
                'categories'=>Categorie::All()
            ]);
        }
        return view('index', [
            'products' => Product::latest()->paginate(),
            'categories'=>Categorie::All()
        ]);
    }

    public function create(){
        return view('create', [
            'categories'=>Categorie::All()
        ]);
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
            'categorie_id'=>Categorie::where('name', $request->categorie_id)->first()->id,
        ]);
        return redirect()->route('index');
    }

    public function get(Product $product){
        return view('product', [
            'product' => $product,
        ]);
    }

    public function edit(Product $product){
        // <input name='categorie_id' type="text" id="categorie_id" placeholder='categoria' class='form-control' value="{{old('categorie_id', $product->categorie->name)}}">
        return view('edit', [
            'product' => $product,
            'categories'=>Categorie::All()
        ]);
    }

    public function update(Product $product, Request $request){
        $request->validate([
            'name'=> 'required',
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
        $product->categorie_id = Categorie::where('name', $request->categorie_id)->first()->id;
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

    public function logout(){
        Auth::logout();
        return redirect('/a');
    }

}

