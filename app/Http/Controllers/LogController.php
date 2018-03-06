<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class LogController extends Controller
{
    public function Login(){
        if(Auth::attempt(['email' => request()->email, 'password' => request()->password])){
            return Redirect::to('admin');
        }
        else{
            Session::flash('message', 'Usuário e/ou senha inválidos!');
            return Redirect::to('/');
        }
    }

    public function Logout(){
        Auth::logout();
        return Redirect::to('/');
    }
}
