<?php

namespace App\Http\Controllers;

use PDF;
use Dompdf\Dompdf;
use Illuminate\Http\Request;
use App\financas;
use Illuminate\Support\Facades\DB;

class RelatorioController extends Controller
{

    public function __construct(){
        $this->middleware('authe');
    }


    public function buscarDados()
    {

        if (request()->tiporelatorio == 'financas') {


            $inicial = request()->dtinicial;
            $final = request()->dtfinal;


            //$financas = DB::table('financas')->join('membros','financas.id_membro','=','membros.id')->select('financas.*','membros.nome as membro-nome')->whereRaw("ifnull(date=$entrada,date)")->get();

            if (request()->tipo == 'todos') {
                $financas = DB::table('financas')->join('membros', 'financas.id_membro', '=', 'membros.id')->select('financas.*', 'membros.nome as membronome')->whereBetween('date', [$inicial, $final])
                    ->orderBy('date', 'asc')->get();
            } elseif (request()->tipo == 'entrada') {
                $financas = DB::table('financas')->join('membros', 'financas.id_membro', '=', 'membros.id')->select('financas.*', 'membros.nome as membronome')->whereRaw("movimentacao = 'entrada'")
                    ->whereBetween('date', [$inicial, $final])->get();
            } elseif (request()->tipo == 'saida') {
                $financas = DB::table('financas')->join('membros', 'financas.id_membro', '=', 'membros.id')->select('financas.*', 'membros.nome as membronome')->whereRaw("movimentacao = 'saida'")
                    ->whereBetween('date', [$inicial, $final])->get();
            }


            return view('relatorio.relatorio-financas', compact('financas'));
        }

        if (request()->tiporelatorio == 'eventos') {
            $inicial = request()->dtinicial;
            $final = request()->dtfinal;

            if (request()->tipo == 'todos') {
                $eventos = DB::table('eventos')->select('eventos.*')->whereBetween('dataevento', [$inicial, $final])->get();
            } else{
                $eventos = DB::table('eventos')->select('eventos.*')->where('tipo',  '=' , request()->tipo )->whereBetween('dataevento', [$inicial, $final])->get();
            }

            return view('relatorio.relatorio-eventos', compact('eventos'));

        }


    }

    public function geraRelatorioFinancas(){
            $financas = json_decode(request()->financas);
            $pdf = PDF::loadView('relatorio.imprimir-financas', ['financas' => $financas]);
            return $pdf->download('Relatório Finanças ' . date('d/m/y') . '.pdf');
    }

    public function geraRelatorioEventos(){
        $eventos = json_decode(request()->eventos);
        $pdf = PDF::loadView('relatorio.imprimir-eventos', ['eventos' => $eventos]);
        return $pdf->download('Relatório Eventos ' . date('d/m/y') . '.pdf');
    }

}
