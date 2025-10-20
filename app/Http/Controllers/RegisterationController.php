<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;
use RegisterationService;

class RegisterationController extends Controller
{
    /**
     * Logic for Registering new Users
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function register(Request $request, RegisterationService $registerService) {
        $registered = $registerService->register($request->all());
        if ($registered["status"] == 400) {
            return back($status=400)->withErrors($registered["errors"]);
        }
        return redirect()->route('verification.notice');
    }
}
