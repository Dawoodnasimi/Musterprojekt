<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller {

    public function register(Request $request) {

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required|email', 'unique:users', 'max:255'],
            'password' => ['required', 'confirmed', 'min:8'],,
        ]);

        dd("passed validation");
    }
}
