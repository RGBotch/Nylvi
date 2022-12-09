<?php

namespace App\Http\Controllers;

use App\Models\Panier;
use Illuminate\Http\Request;

class PanierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        return response()->json([
            Panier::with('products')->get()->toArray()
        ]);
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Panier  $panier
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Panier $panier)
    {
        $panier->products;
        return response()->json([
            $panier->toArray()
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
            'date' => 'date',
            'price' => 'required|integer',
            'size' => 'required|integer'
        ]);

        $panier = Panier::create([
            "name" => $request->name,
            "date" => $request->date,
            "price" => $request->price,
            "size" => $request->size
        ]);

        return response()->json($panier, 201);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Panier  $panier
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, Panier $panier)
    {
        $this->validate($request, [
            'name' => 'required|max:100',
            'date' => 'date',
            'price' => 'required|integer',
            'size' => 'required|integer'
        ]);

        $panier->update([
            "name" => $request->name,
            "date" => $request->date,
            "price" => $request->price,
            "size" => $request->size
        ]);

        return response()->json();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $panier
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Panier $panier)
    {
        $panier->delete();

        return response()->json();
    }
}
