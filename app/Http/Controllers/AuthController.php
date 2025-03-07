<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * Hangling the User Login Logic
     * Autherizing the User to user the website features.
     * @param \Illuminate\Http\Request $request
     * @return mixed|\Illuminate\Http\RedirectResponse
     */
    public function login(Request $request)
    {
        $credintials = $request->validate([
            'username' => "required",
            "password" => "required"
        ]);
        if (Auth::attempt($credintials, $request->boolean('remember_me'))) {
            session()->regenerate();
            $user_id = User::where('username', '=', $credintials['username'])->get('id')->first()->id;
            session(['user_id'=> $user_id]);

            if (session()->get('goto') === null) {
                return redirect()->route('home');
            } else {
                $goto = session()->get('goto');
                session()->forget('goto');
                return redirect($goto);
            }
        }
        return back()->withErrors([
            'username' => "Your username or your password is invalid"
        ])->onlyInput('username');
    }

    /**
     * This method is responsible for logging the user out and clearing the session storage
     * @return mixed|\Illuminate\Http\RedirectResponse
     */
    public function logout()
    {
        Auth::logout();

        session()->flush();
        session()->invalidate();
        session()->regenerateToken();

        return redirect()->route('home');
    }
}
