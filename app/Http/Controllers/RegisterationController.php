<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\RegisterationService;

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
            return back()->withErrors($registered["errors"]);
        }
        return redirect()->route('verification.notice');
    }
}
