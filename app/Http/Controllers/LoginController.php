<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function show()
    {
        if (Auth::check()) {
            // TODO: Redirect to personal profile page
            return redirect()->route('index');
        }

        return view('auth.login');
    }

    public function login(LoginRequest $request)
    {
        $credentials = $request->validated();
        $remember = $request->has('remember');

        if (Auth::attempt($credentials, $remember)) {
            $request->session()->regenerate();

            return redirect()->intended();
        }

        return back()
            ->withErrors([
                'username' => __('auth.failed'),
            ])
            ->withInput($request->except(['password']));
    }
}
