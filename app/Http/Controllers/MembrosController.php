<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Membros;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

class MembrosController extends Controller
{

    public function __construct(){
        $this->middleware('authe');
    }

   public function store(Request $request){
      Membros::create([
          'nome' =>$request['nome'],
          'telefone' =>$request['telefone'],
          'email'=> $request['email'],
          'dtnasc'=> $request['dtnasc'],
      ]);
      Session::flash('message', 'Membro cadastrado com sucesso!');
      return Redirect::to('/membros');
       
   }
   public function index(){
      $membros = Membros::All();
      return view('membros.index', compact('membros'));
   }

   public function alterar(Request $request){


      $id = request()->id;
      $membro = Membros::find($id);
      $membro->fill($request->all());
      $membro->save();

      Session::flash('message', 'Membro alterado com sucesso!');
      return Redirect::to('/membros');
   }
   public function excluir(){
         $id = request()->id;

         $membro = Membros::find($id);
         $membro->delete();

      Session::flash('message', 'Membro excluído com sucesso!');
      return Redirect::to('/membros');
   }
    //
}
