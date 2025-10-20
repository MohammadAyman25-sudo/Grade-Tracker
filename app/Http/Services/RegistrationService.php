<?php

use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Validator;

class RegisterationService {
    public function register(array $input) {
        $validator = Validator::make($input, [
            "first_name" => "required",
            "last_name" => "required",
            "email" => "required|email|unique:users",
            "username" => "required|unique:users",
            "password" => "required|confirmed|min:8"
        ]);

        if ($validator->fails()) {
            return [
                "status" => 400,
                "errors" => $validator->errors()->all(),
            ];
        }

        $validated = $validator->validated();

        $name = $validated['first_name'] . ' ' . $validated['last_name'];
        $username = $validated['username'];
        $email = $validated['email'];
        $password = bcrypt($validated['password']);
        $user = User::create([
            "name" => $name,
            "username" => $username,
            "email" => $email,
            "password" => $password
        ]);
        session(['email' => $email]);
        event(new Registered($user));
        return [
            "status" => 200,
            "errors" => null,
        ];
    }
}