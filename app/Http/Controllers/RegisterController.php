<?php

namespace App\Http\Controllers;

use GuzzleHttp\Psr7\Request;
use Illuminate\Http\Client\Request as ClientRequest;

// use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function index(){
        return view('/register', [
            'title' => 'Register'
        ]);
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required|max:255',
            'id_karyawan' => 'required|unique:users',
            'password'=> 'required|min:8|max:255'
        ]); 

        dd($request->all());
    }
}
