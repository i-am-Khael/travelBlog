<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = User::simplePaginate(5);
        return view('dashboard.index', [ 'users' => $data ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.addUser');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:60',
            'email' => 'required|email',
            'password' => 'required|min:8'
        ]);

        $result = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password
        ]);

        if($result->save()){
            return redirect()->route('dash.create')->with('success', 'Added user successfully!');
        } else {
            return redirect()->route('dash.create')->with('error', 'Adding user failed!');
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
