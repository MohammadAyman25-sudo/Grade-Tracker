<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Auth\Events\PasswordReset;

class PasswordResetController extends Controller
{
    /**
     * This method redirects the user to the page where he'll update the password for his account.
     * @param \Illuminate\Http\Request $request
     * @param string $token
     * @return \Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse
     */
    public function resetPasswordView(Request $request, string $token)
    {
        // return view('auth.reset-password', ['token' => $token]);
        $email = $request->get('email');
        $record = DB::table('password_reset_tokens')->where('email', $email)->first();
        if (Hash::check($token, $record->token) && (Carbon::parse($record->created_at)->diffInMinutes(Carbon::now()) <= config('auth.passwords')['users']['expire'])) {
            return view('auth.reset-password', ['token' => $token]);
        } else {
            return redirect('login')->withErrors(['token' => __('passwords.token')]);
        }
    }

    /**
     * this method sends a password reset link to the user to his emali address he provided
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function forgotPassword(Request $request)
    {
        $request->validate([
            'email' => 'email|required'
        ]);
        $status = Password::sendResetLink(
            $request->only('email')
        );
        return $status === Password::RESET_LINK_SENT
            ? back()->with(['status' => __($status)])
            : back()->withErrors(['email' => __($status)]);
    }

    /**
     * This method handles the reset password request sent by the user and updates his password to the new one he provided.
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function resetPassword(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8|confirmed'
        ]);
        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function (User $user, string $password) {
                $user->forceFill([
                    'password' => bcrypt($password)
                ])->setRememberToken(Str::random(60));

                $user->save();
                event(new PasswordReset($user));
            }
        );

        return $status === Password::PASSWORD_RESET
            ? redirect()->route('login')->with('status', __($status))
            : back()->withErrors(['email' => [__($status)]]);
    }
}
