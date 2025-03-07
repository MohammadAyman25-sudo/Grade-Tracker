<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Verified;
use Illuminate\Support\Facades\Log;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

class EmailVerificationController extends Controller
{
    /**
     * Hangling The Request Sent from the Email Verification Link Sent to the User's Email Address
     * @param \Illuminate\Foundation\Auth\EmailVerificationRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function handleEmailVerification(Request $request)
    {

        $user = User::where('id', '=', $request->route('id'))->first();
        
        if (!hash_equals((string) $request->route('hash'), sha1($user->getEmailForVerification()))) {
            abort(403, "Invalid verification link.");
        }
        
        if ($user->hasVerifiedEmail()) {
            return redirect()->intended('/')->with('status', 'Email already verified.');
        }
        
        $user->markEmailAsVerified();
        event(new Verified($user));

        return redirect()->intended('/')->with('status', 'Email verified successfully.');
    }
    /**
     * This method Resends a Verification Link to the User's Email Address If he/she lost the email or 
     * the link had expired
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function emailVerificationResend(Request $request)
    {
        $request->user()->sendEmailVerificationNotification();

        return back();
    }
}
