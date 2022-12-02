<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use Illuminate\Http\Request;

class CategorieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        return response()->json([
            Categorie::all()->toArray()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:100',
            'date' => 'date'
        ]);

        $categorie = Categorie::create([
            "name" => $request->name,
            "date" => $request->date
        ]);

        return response()->json($categorie, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Categorie  $categorie
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Categorie $categorie)
    {
        return response()->json([
            $categorie->toArray()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Categorie  $categorie
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, Categorie $categorie)
    {
        $this->validate($request, [
            'name' => 'required|max:100',
            'date' => 'date'
        ]);

        $categorie->update([
            "name" => $request->name,
            "date" => $request->date
        ]);

        return response()->json();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Categorie  $categorie
     * @param  \App\Models\Artiste  $artiste
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Categorie $categorie,Artiste $artiste, Product $product)
    {
        $categorie->delete();

        return response()->json();
    }
}
