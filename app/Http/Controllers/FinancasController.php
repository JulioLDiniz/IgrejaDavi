<?php

namespace App\Http\Controllers;

use App\financas;
use App\Membros;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

class FinancasController extends Controller
{
    public function index(){
        $membros = Membros::all(['id','nome']);
        return view('financas.entrada', compact('membros'));
    }

    public function cadastrar(){
        $nome = request()->membroid;

        return $nome;
    }
    
    public function entrada(Request $request){
        
       /* financas::create([
            'finalidade'=>$request['finalidade'],
            'valor'=>$request['valor'],
            'date'=>$request['date'],
            'observacoes'=>$request['observacoes'],
            'id_membro'=>$request['membroid'],
        ]);*/

        $financa = new financas();
        $financa->movimentacao = 'entrada';
        $financa->finalidade = $request->finalidade;
        $financa->valor =str_replace(',','.',$request->valor);

        $financa->date = $request->date;
        $financa->observacoes = $request->observacoes;
        $financa->id_membro = $request->membroid;
        $financa->save();

        Session::flash('message', 'Entrada financeira cadastrada com sucesso!');
        return Redirect::to('/membros');
       
    }

    public function gestao(){
        $movimentacao = financas::all();

        $movimentacao = json_encode($movimentacao);

        return view('financas.gestao')->with($movimentacao);

    }

}
