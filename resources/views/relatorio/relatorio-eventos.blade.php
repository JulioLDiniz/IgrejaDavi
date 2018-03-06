@extends('layouts.admin')
@section('content')

    <h1 class="text-center" style="margin-bottom: 80px;">Relatório de eventos</h1>

    <div id="relatorio-eventos">
        <form action="/buscar-dados" method="post" class="form-inline" >
            {{ csrf_field() }}
            <input type="hidden" name="tiporelatorio" value="eventos">

            <div class="form-group">
                <label for="dtinicial">Data inicial:</label>
                <input type="date" name="dtinicial" class="form-control" required >
            </div>
            <div class="form-group">
                <label for="dtfinal">Data final:</label>
                <input type="date" name="dtfinal" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="tipo">Tipo:</label>
                <select name="tipo" class="form-control">
                    <option value="todos" selected>Todos</option>
                    <option value="congresso">Congresso</option>
                    <option value="curso">Curso</option>
                    <option value="retiro">Retiro</option>
                    <option value="consagracao">Consagração</option>
                    <option value="culto">Culto</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Buscar</button>
        </form>

        @if(isset($eventos))
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>Título</th>
                            <th>Tipo</th>
                            <th>Data Evento</th>
                            <th>Observações</th>
                            <th >Status</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($eventos as $evento)
                            <tr>
                                <td>{{$evento->titulo}}</td>
                                <td>{{ucfirst($evento->tipo)}}</td>
                                <td>{{\Carbon\Carbon::createFromFormat("Y-m-d", $evento->dataevento)->format("d/m/Y")}}</td>
                                <td>{{$evento->observacoes}}</td>
                                <td>{{$evento->status}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <a href="{{url('/imprimir-eventos',$eventos)}}" ><button class="btn btn-primary">Gerar PDF</button></a>
        @endif

    </div>

@endsection