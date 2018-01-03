@extends('layouts.admin')
@section('content')

<h1 class="text-center">Listagem de Eventos</h1>
    @if(Session::has('message'))
        <div class="container">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <p class="text-center">{{Session::get('message')}}</p>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
    @endif
<div class="card-body">
    <div class="table-responsive">
        <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
            <thead>
            <tr>
                <th>Título</th>
                <th>Tipo</th>
                <th>Data</th>
                <th >Observaçoes</th>
                <th >Status</th>
                <th>Opções</th>
            </tr>
            </thead>
            <tbody>
            @foreach($eventos as $evento)
                @if($evento->status == 'Em aberto')
                <tr >
                    @endif
                    <td>{{$evento->titulo}}</td>
                    <td>{{$evento->tipo}}</td>
                    <td >{{\Carbon\Carbon::createFromFormat("Y-m-d", $evento->dataevento)->format("d/m/Y")}}</td>
                    <td>{{$evento->observacoes}}</td>
                    <td class="text-center">
                    @if($evento->status == 'Em aberto')
                        <a href="/alterar-status-andamento?id={{$evento->id}}"><span class="badge badge-success">Em aberto</span></a>
                    @elseif($evento->status == 'Em andamento')
                        <a href="/encerrar-evento?id={{$evento->id}}"><span class="badge badge-warning">Em andamento</span>
                     @elseif($evento->status == 'Encerrado')
                     <span class="badge badge-danger">Encerrado</span>
                    @endif
                    </td>

                    <td>
                        <a href="#" class="text-center" style="margin-left: 40%;padding: 10px"><i class="fa fa-trash" aria-hidden="true" data-toggle="modal" data-target="#excluir"
                                       data-whatevertitulo="{{$evento->titulo}}"
                                       data-whatevertipo="{{$evento->tipo}}"
                                       data-whateverdataevento="{{$evento->dataevento}}"
                                       data-whateverobservacoes="{{$evento->observacoes}}"
                                       data-whateverid="{{$evento->id}}"></i></a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>

<!--MODAL EXCLUIR-->
<div class="modal fade" id="excluir" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Excluir Evento</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('eventos.excluir') }}" method="post">
                    {{csrf_field()}}

                    <input type="hidden" readonly class="form-control" id="id" name="id" >
                    <div class="form-group">
                        <label for="nome" class="col-form-label">Título:</label>
                        <input type="text" readonly class="form-control" id="titulo" name="titulo" >
                    </div>
                    <div class="form-group">
                        <label for="tipo" class="col-form-label">Tipo:</label>
                        <input type="text" readonly class="telefone form-control" name="tipo" id="tipo" >
                    </div>
                    <div class="form-group">
                        <label for="dataevento" class="col-form-label">Data Evento:</label>
                        <input type="date" readonly class="form-control" name="dataevento" id="dataevento">
                    </div>
                    <div class="form-group">
                        <label for="observacoes" class="col-form-label">Obervações:</label>
                        <input type="text" readonly class="form-control" name="observacoes" id="observacoes">
                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-primary">Excluir</button>
            </div>
            </form>
        </div>
    </div>
</div>
<!--FIM MODAL EXCLUIR-->

<script type="text/javascript">

    $('#excluir').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var titulo = button.data('whatevertitulo')
        var tipo = button.data('whatevertipo')
        var dataevento = button.data('whateverdataevento')
        var observacoes = button.data('whateverobservacoes')
        var id = button.data('whateverid')


        // Extract info from data-* attributes
        // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
        // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
        var modal = $(this)
        modal.find('.modal-title').text('Excluir Evento ' + titulo)
        modal.find('.modal-body input#titulo').val(titulo)
        modal.find('.modal-body input#tipo').val(tipo)
        modal.find('.modal-body input#dataevento').val(dataevento)
        modal.find('.modal-body input#observacoes').val(observacoes)
        modal.find('.modal-body input#id').val(id)
    });
</script>


@endsection