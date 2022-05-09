<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller

{
    public function index()
    {
        return view('register.index',[
            'title' => 'Register',
            'active' => 'register'
        ]);
    }
    public function store(Request $request)
    {
        // return view('register.store',[
        //     'title' => 'Register',
        //     'active' => 'register'
        // ]);
        $validateData = $request->validate([
            'name' => 'required|max:200',
            'username' => 'required|min:4|max:200|unique:users',
            'email' => 'required|email:dns|max:100|unique:users',
            'password' => 'required|min:6|max:255',
        ]);
        $validateData['password'] = bcrypt($validateData['password']);
        User::create($validateData);   
        // $request->session()->flash('success', 'Register Success');
        return redirect('/login')->with('success','Register Success');
    }
}
