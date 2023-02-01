<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends \Illuminate\Routing\Controller
{
    public function index()
    {
        $users = User::all();

        return response()->json($users);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(User $user)
    {
        return response()->json([
            $user->toArray()
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'ville' =>'required|max:100',
            'name' => 'required|max:100',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8'
        ]);

        $user = User::create([
            'ville' =>$request->ville,
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        return response()->json($user, 201);
    }
}
