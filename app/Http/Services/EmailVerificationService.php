<?php

namespace App\Http\Services;

use App\Models\User;
use Illuminate\Auth\Events\Verified;

class EmailVerificationService {
    public function handleVerification(array $params) {
        $user = User::where('id', '=', $params["id"])->first();

        if (!hash_equals((string) $params['hash'], sha1($user->getEmailForVerification()))) {
            return [
                "status" => 403,
                "path" => null,
                "message" => "Invalid verification link.",
            ];
        }

        if ($user->hasVerifiedEmail()) {
            // return redirect()->intended('/')->with('status', 'Email already verified.');
            return [
                "status" => 400,
                "path" => "/",
                "message" => "Email already verified.",
            ];
        }

        $user->markEmailAsVerified();
        event(new Verified($user));

        return [
            "status" => 200,
            "path" => "/",
            "message" => "Email verified successfully.",
        ];
    }
}