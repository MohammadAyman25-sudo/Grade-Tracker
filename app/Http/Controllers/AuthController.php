<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\AuthService;

class AuthController extends Controller
{
    /**
     * Hangling the User Login Logic
     * Autherizing the User to user the website features.
     * @param \Illuminate\Http\Request $request
     * @return mixed|\Illuminate\Http\RedirectResponse
     */
    public function login(Request $request, AuthService $authService)
    {
        $response = $authService->login($request->all(), $request->boolean("remember_me"));
        if ($response["status"] == 200) {
            if (session()->get('goto') !== 1) {
                return redirect()->route('home');
            } else {
                $goto = session()->get('goto');
                session()->forget('goto');
                return redirect($goto);
            }
        }
        return back($status = $response["status"])->withErrors($response["errors"])->onlyInput('username');
    }

    /**
     * This method is responsible for logging the user out and clearing the session storage
     * @return mixed|\Illuminate\Http\RedirectResponse
     */
    public function logout(AuthService $authService)
    {
        $authService->logout();
        return redirect()->route('home');
    }
}
