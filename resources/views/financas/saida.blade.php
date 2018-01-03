@extends('layouts.admin')
@section('content')

<h1 class="text-center">Registro de Saída Financeira</h1>

    <form action="/financas-saida" method="post" style="padding:35px;">
        {{csrf_field()}}
        <div class="form-group">
            <label for="finalidade" class="col-form-label">Finalidade:</label>
            <input type="text" class="form-control" required  name="finalidade" >
        </div>
        <div class="form-group">
            <label for="valor" class="col-form-label">Valor:</label>
            <div class="input-group">
                <span class="input-group-addon" id="basic-addon1">R$</span>
                <input type="text" class="money form-control"  required  name="valor" >
            </div>
        </div>
        <label for="membro" class="col-form-label">Adicionar opção de agregar evento:</label>
        <div class="form-group">
            <label for="data" class="col-form-label">Data:</label>
            <input type="date" class="form-control" required  name="date" placeholder="dd/mm/yyyy">
        </div>
        <div class="form-group">
            <label for="observacoes" class="col-form-label">Observações:</label>
            <textarea class="form-control" required  name="observacoes" ></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Cadastrar</button>
        <button type="reset" class="btn btn-warning">Limpar</button>
    </form>

@endsection