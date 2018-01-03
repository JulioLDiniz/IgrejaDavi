<?php

namespace App\Http\Controllers;

use App\eventos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class EventosController extends Controller
{
    public function index(){
        $eventos = eventos::all();
        return view('eventos.index', compact('eventos'));
    }
    public function cadastrar(Request $request){
        $evento = new eventos();
        $evento->titulo = $request->titulo;
        $evento->tipo= $request->tipo;
        $evento->dataevento= $request->dataevento;
        $evento->observacoes= $request->observacoes;
        $evento->status = 'Em aberto';
        $evento->save();

        Session::flash('message', 'Evento cadastrado com sucesso!');
        return Redirect::to('/eventos');

    }
    public function excluir(){
        $id = request()->id;

        $evento = eventos::find($id);
        $evento->delete();

        Session::flash('message', 'Evento excluído com sucesso!');
        return Redirect::to('/eventos');
    }
    public function alterarStatusAndamento(){
        $id = request()->id;

        $evento = eventos::find($id);
        $evento->status = 'Em andamento';
        $evento->save();

        Session::flash('message', 'Alterado status com sucesso!');
        return Redirect::to('/eventos');
    }
    public function encerrarEvento(){
    $id = request()->id;

    $evento = eventos::find($id);
    $evento->status = 'Encerrado';
    $evento->save();

    Session::flash('message', 'Evento encerrado com sucesso!');
    return Redirect::to('/eventos');
}
}
