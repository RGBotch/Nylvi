<?php

namespace App\Http\Controllers;

use App\Models\Artiste;
use Illuminate\Http\Request;

class ArtisteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        return response()->json([
            Artiste::all()->toArray()
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

        $artiste = Artiste::create([
            "name" => $request->name,
            "date" => $request->date
        ]);

        return response()->json($artiste, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Artiste  $artiste
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Artiste $artiste)
    {
        return response()->json([
            $artiste->toArray()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Artiste  $artiste
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, Artiste $artiste)
    {
        $this->validate($request, [
            'name' => 'required|max:100',
            'date' => 'date'
        ]);

        $artiste->update([
            "name" => $request->name,
            "date" => $request->date
        ]);

        return response()->json();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Artiste  $artiste
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Artiste $artiste)
    {
        $artiste->delete();

        return response()->json();
    }
}
