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
            return response()->json(['message' => 'The email or password is incorrect.'], 401);
        }

        // Check if the account is activated
        if (!$employee->activate) {
            return response()->json(['message' => 'Your account is not activated. Please contact the administrator.'], 403);
        }

        // Attempt to log in the user
        if (Auth::attempt($credentials)) {
            return response()->json(['message' => 'Logged in successfully!', 'redirect' => route('DASHBOARDLandingpage_employee')], 200);
        }

        // Failed login
        return response()->json(['message' => 'The email or password is incorrect.'], 401);
    }



    public function destroy(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login_employee')->with('message', 'Logged out successfully.');
    }
}
