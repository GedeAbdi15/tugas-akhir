<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

// use Illuminate\Http\Request;
// use PhpParser\Node\Stmt\Return_;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login', [
            'title' => 'Login'
        ]);
    }

    public function authenticate(Request $request)
    {
        // return view('auth.login', [
        //     'title' => 'Login'
        // ]);

        // dd($request->all());

        if (Auth::attempt($request->only('NIP', 'password'))) {
            return redirect('/home');
        }
        return redirect('/');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/');
    }
}
