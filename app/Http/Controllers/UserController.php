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
        $data = User::paginate(5);
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
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8'
        ]);

        $result = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password
        ]);

        if($result->save()){
            return redirect()->route('user.create')->with('success', 'Added user successfully!');
        } else {
            return redirect()->route('user.create')->with('error', 'Adding user failed!');
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
        $data = User::findOrFail($id);
        return view('dashboard.updateUser', [ 'user' => $data ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $res = User::findOrFail($id);

        $request->validate([
            'name' => 'required|max:60',
            'email' => 'required|email|unique:users,email'
        ]);

        $res->name = $request->name;
        $res->email = $request->email;

        if($res->save()){
            return redirect()->route('user.update', $id)->with('success', 'Updated data successfully!');
        }else {
            return redirect()->route('user.update', $id)->with('error', 'Updating Failed!');
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $res = User::findOrFail($id);
        if($res->delete()){
            return redirect()->route('user.index')->with('success', 'User deleted!');
        } else {
            return redirect()->route('user.index')->with('error', 'Deleting user failed!');
        }
    }
}
