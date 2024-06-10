<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller {

    public function register(Request $request) {

        $fields = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'unique:users', 'max:255'],
            'password' => ['required', 'confirmed', 'min:8'],
        ]);

        //Register
        $user = User::create($fields);

        //Login
        Auth::login($user);

        return redirect()->route('home');
    }

    public function login(Request $request) {

        dd($request);
    }
}
