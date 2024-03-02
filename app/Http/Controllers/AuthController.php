<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\User;

class AuthController extends Controller
{

    public function authUser(Request $request) {

        $request->validate([
            'email' => 'required|email',
            'password' => 'required|max:255'
        ]);

        $credentials = $request->only('email', 'password');

        if(Auth::attempt($credentials)) {
            return redirect()->route('user.index');
        } else {
            return redirect()->route('login')->with('error', 'Login Failed!');
        }


    }

}
