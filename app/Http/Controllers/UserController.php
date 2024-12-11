<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function showSignInForm()
    {
        return view('signin');
    }

    public function signIn(Request $request)
    {
        $user = $request->only('email', 'password');
        
        if ($user['email'] === 'user@example.com' && $user['password'] === 'password123') {
            $request->session()->put('user', ['is_login' => true, 'email' => $user['email']]);
            return redirect('/profile');
        }

        return redirect('/signin')->with('error', 'Invalid credentials');
    }

    public function showSignUpForm()
    {
        return view('signup');
    }

    public function signUp(Request $request)
    {
        $user = $request->only('email', 'password');

        $request->session()->put('user', ['is_login' => true, 'email' => $user['email']]);
        return redirect('/profile');
    }

    public function profile(Request $request)
    {
        $user = $request->session()->get('user');
        if (!isset($user['is_login']) || !$user['is_login']) {
            return redirect('/signin')->with('error', 'Anda harus login terlebih dahulu');
        }

        return view('profile', ['user' => $user]);
    }

    public function blog()
    {
        return view('blog');
    }
}
