<?php

namespace App\Http\Controllers;

use App\Models\Taille;
use Illuminate\Http\Request;

class TailleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        return response()->json([
            Taille::all()->toArray()
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

        $taille = Taille::create([
            "name" => $request->name,
            "date" => $request->date
        ]);

        return response()->json($taille, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Taille  $taille
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Taille $taille)
    {
        return response()->json([
            $taille->toArray()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Taille  $taille
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, Taille $taille)
    {
        $this->validate($request, [
            'name' => 'required|max:100',
            'date' => 'date'
        ]);

        $taille->update([
            "name" => $request->name,
            "date" => $request->date
        ]);

        return response()->json();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Taille  $taille
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Taille $taille)
    {
        $taille->delete();

        return response()->json();
    }
}
