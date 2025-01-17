<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\Controller as BaseController;

class AuthController extends BaseController
{
    public function login_employee(Request $request)
    {
        // Validate the input
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        // Check if the user exists
        $employee = \App\Models\Employee::where('email', $credentials['email'])->first();

        if (!$employee) {
            // Employee not found
            return back()->withErrors([
                'email' => 'The email or password is incorrect.',
            ])->withInput($request->only('email'));
        }

        // Check if the account is activated
        if (!$employee->activate) {
            // Account is not activated
            return back()->withErrors([
                'email' => 'Your account is not activated. Please contact the administrator.',
            ])->withInput($request->only('email'));
        }

        // Attempt to log in the user
        if (Auth::attempt($credentials)) {
            // Successful login
            return redirect()->route('DASHBOARDLandingpage_employee')->with('success', 'Logged in successfully!');
        }

        // Failed login
        return back()->withErrors([
            'email' => 'The email or password is incorrect.',
        ])->withInput($request->only('email'));
    }



    public function destroy(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login_employee')->with('message', 'Logged out successfully.');
    }
}
