<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Categorie;
use Illuminate\Http\Request;

use App\Http\Resources\V1\CategorieResource;
use App\Http\Resources\V1\CategorieCollection;

class CategorieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new CategorieCollection(Categorie::All());
    }

    public function store(Request $request)
    {
        $categorie = Categorie::create([
            'name' => $request->name,
        ]);
        return new CategorieResource($categorie);
    }

    public function show($id)
    {
        $categorie = Categorie::where('id', $id)->first();
        return new CategorieResource($categorie);
    }

    public function update(Request $request, $id)
    {
        $categorie = Categorie::where('id', $id)->first();
        $categorie->name = $request->name;
        $categorie->save();

        return new CategorieResource($categorie);
    }

    public function destroy($id)
    {
        $categorie = Categorie::where('id', $id)->first();
        $categorie->delete();

        return response()->json([
            'message' => 'Success',
        ], 403);
    }
}
