<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

class EmailController extends Controller
{
    public function __construct(){
        $this->middleware('authe');
    }

    public function enviar(Request $request){
        Mail::send('email.contact', $request->all(), function($msg){
            $msg->subject('Igreja Davi');
            $msg->to(request()->para);
        });

        Session::flash('message', 'E-mail para '.request()->para.' enviado com sucesso!');
        return Redirect::to('/enviar-email');
    }
}
