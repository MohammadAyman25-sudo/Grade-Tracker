<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;

class RegisterationController extends Controller
{
    /**
     * Logic for Registering new Users
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function register(Request $request) {
        $validated = $request->validate([
            "first_name" => "required",
            "last_name" => "required",  
            "email" => "required|email|unique:users",
            "username" => "required|unique:users",
            "password" => "required|confirmed|min:8"
        ]);
        $name = $request->input('first_name').' '.$request->input('last_name');
        $username = $request->input('username');
        $email = $request->input('email');
        $password = bcrypt($request->input('password'));
        $user = User::create([
            "name" => $name,
            "username" => $username,
            "email" => $email,
            "password" => $password
        ]);
        session(['email' => $email]);
        event(new Registered($user));
        return redirect()->route('verification.notice');
    }
}
