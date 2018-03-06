@extends('layouts.admin')
@section('content')

    <h1 class="text-center" style="margin-bottom: 80px;">Relatório de finanças</h1>

    <div id="relatorio-financas">
        <form action="/buscar-dados" method="POST" class="form-inline">
            {{ csrf_field() }}
            <input type="hidden" name="tiporelatorio" value="financas">

            <div class="form-group">
                <label for="dtinicial">Data inicial:</label>
                <input type="date" name="dtinicial" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="dtfinal">Data final:</label>
                <input type="date" name="dtfinal" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="tipo">Tipo:</label>
                <select name="tipo" class="form-control">
                    <option selected value="todos">Todos</option>
                    <option value="entrada">Entrada</option>
                    <option value="saida">Saída</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Buscar</button>
        </form>
        @if(isset($financas))
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>Finalidade</th>
                        <th>Valor</th>
                        <th>Data</th>
                        <th >Observações</th>
                        <th>Tipo</th>
                        <th>Membro</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($financas as $financa)
                        <tr>
                            <td>{{$financa->finalidade}}</td>
                            <td>{{$financa->valor}}</td>
                            <td>{{\Carbon\Carbon::createFromFormat("Y-m-d", $financa->date)->format("d/m/Y")}}</td>
                            <td >{{$financa->observacoes}}</td>
                            <td >{{$financa->movimentacao}}</td>
                            <td >{{$financa->membronome}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
            <a href="{{url('/imprimir-financas',$financas)}}" ><button class="btn btn-primary">Gerar PDF</button></a>
        @endif

    </div>









@endsection