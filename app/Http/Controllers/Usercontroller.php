<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class Usercontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'username' => 'required|unique:users',
            'password' => 'required',
        ]);

        User::create($validate);

        return redirect() -> route ('user.index')
        ->with('sucess', 'AEEEEEEEEEEE createado');
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        return view('user.edit', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        return view('users.update');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $validate = $request->validate([
            'username' => 'required|unique:users'. $id,
            'password' => 'required',
        ]);

        $user = User::findOrFail($id);
        $user -> update($validate);

        return redirect() -> route ('user.index')
        ->with('sucess', 'AEEEEEEEEEEE updateado');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $user = User::findOrFail($id);

        $user -> delete();

        return redirect() -> route ('user.index')
        ->with('sucess', 'AEEEEEEEEEEE deletado');
    }
}
