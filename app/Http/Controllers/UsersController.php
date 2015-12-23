<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    public function getLogin(){

        if (Auth::check())
        {
            return redirect('/content')->with('message','you are already logged in.');
        }

        return view('auth.login');

    }
    public function getRegister(){

        if (Auth::check())
        {
            return redirect('/content')->with('message','you are already logged in.');
        }

        return view('auth.register');


    }
}