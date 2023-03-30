<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function get_login()
    {
        return view('auth.login');
    }

    public function post_login(Request $request)
    {
        $this->validate($request, [
            'username' => 'required',
            'password' => 'required'
        ]);

        $username = $request->username;
        $password = $request->password;

        if (!auth()->attempt(['username' => $username, 'password' => $password])) {
            return redirect()->route('auth.login.get');
        }

        return redirect()->route('dashboard');
    }

    public function logout()
    {
        auth()->logout();
        return back()->with('success', 'You are now logged out');
    }
}
