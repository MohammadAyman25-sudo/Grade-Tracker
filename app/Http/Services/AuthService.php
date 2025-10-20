<?php

namespace App\Http\Services;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthService
{
    public function login(array $credentials, bool $remember_me) {
        $validator = Validator::make($credentials, [
            'username' => "required",
            "password" => "required"
        ]);
        if ($validator->fails()) {
            return [
                "status" => 400,
                "errors" => $validator->errors()->all(),
            ];
        }
        $validated = $validator->validate();
        if (Auth::attempt($validated, $remember_me)) {
            session()->regenerate();
            $user_id = User::where('username', '=', $validated['username'])->get('id')->first()->id;
            session(['user_id' => $user_id]);
            return [
                "status" => 200,
                "errors" => null,
            ];
        }
    }

    public function logout() {
        Auth::logout();

        session()->flush();
        session()->invalidate();
        session()->regenerateToken();
    }
}