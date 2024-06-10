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

        //Generate Token
        $token = $user->createToken(env('APP_NAME'))->plainTextToken;

        //Response

        $response = [
            'user' => $user,
            'token' => $token,
        ];

        return response($response, 201);

        //Login
        Auth::login($user);


        //Login
        //Auth::login($user);

        return redirect()->route('home');
    }
}
