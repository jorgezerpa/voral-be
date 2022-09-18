<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categorie;

use Storage;

class CategorieController extends Controller
{
    //list categories
    public function index(Request $request){
        return view('indexCategories', [
            'categories'=>Categorie::All()
        ]);
    }

    public function edit(Categorie $categorie){
        return view('editCategories', [
            'categorie'=>$categorie
        ]);
    }

    public function update(Categorie $categorie, Request $request){
        $request->validate([
            'name'=> 'required',
        ]);
        $fileName = '';
        if($request->hasFile('image')){
            if(Storage::exists($categorie->image)){
                Storage::delete($ategorie->image);
            }
            $fileName=$request->file('image')->store('public');
        } else {
            $fileName=$categorie->image;
        }
        $categorie->name = $request->name;
        $categorie->image = $request->hasFile('image') ? $request->getSchemeAndHttpHost().str_replace('public','/storage', $fileName) : $fileName=$categorie->image;
        $categorie->save();
        return redirect()->route('index');
    }

    public function destroy(Categorie $categorie, Request $request){
        $categorie->delete();
        // $local = $request->getSchemeAndHttpHost();
        // //public cause work on real folder, not on simbolic folder. storage/public/image->yes vs storage/image->no
        // $image_name = str_replace($local.'/storage/','public/', $categorie->image);
        // if(Storage::exists($image_name)){
        //         Storage::delete($image_name);
        // }
        return redirect()->route('index');
    }
}

