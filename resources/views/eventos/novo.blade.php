@extends('layouts.admin')
@section('content')

    <h1 class="text-center">Cadastro de Evento</h1>

    <form action="/eventos-cadastrar" method="post" style="padding: 35px;">
        {{csrf_field()}}
        <div class="form-group">
            <label for="titulo">Título:</label>
            <input type="text" class="form-control" required name="titulo">
        </div>
        <label for="tipo">Tipo:</label>
        <div class="form-group">

            <select name="tipo" id="tipo" class="form-control">
                <option value="congresso">Congresso</option>
                <option value="curso">Curso</option>
                <option value="retiro">Retiro</option>
                <option value="consagracao">Consagração</option>
                <option value="culto">Culto</option>
            </select>
        </div>
        <div class="form-group">
            <label for="dataevento">Data:</label>
            <input type="date" name="dataevento" class="form-control">
        </div>
        <div class="form-group">
            <label for="observacoes" >Observações:</label>
            <textarea name="observacoes" class="form-control"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Cadastrar</button>
        <button type="reset" class="btn btn-warning">Limpar</button>
    </form>
@endsection