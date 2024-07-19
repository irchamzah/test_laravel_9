<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Account;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('username', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->intended('home')
                ->with('success', 'Login successful.');
        }

        return redirect()->back()
            ->withErrors(['username' => 'Invalid credentials'])
            ->withInput();
    }


    public function logout(Request $request)
    {
        Auth::guard('web')->logout();
        return redirect('/');
    }
}
