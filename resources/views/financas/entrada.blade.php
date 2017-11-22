@extends('layouts.admin')
@section('content')
    <h1 class="text-center">Registro de Entrada Financeira</h1>

    <form action="/financas-entrada" method="post" style="padding:35px;">
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
        <label for="membro" class="col-form-label">Membro:</label>
        <div class="form-inline">
            <input type="hidden" name="membroid" id="membroid" required>
            <input type="text" readonly class="form-control" required  name="membronome" id="membronome" >
            <button type="button" class="btn btn-secondary"  data-toggle="modal" data-target="#modalselecionar">Selecionar</button>
        </div>
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

    <!--MODAL ESCOLHER MEMBRO-->
    <div class="modal fade" id="modalselecionar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Selecionar Membro</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <select class="custom-select form-control" required name="membro"  id="membroselect">
                    @foreach($membros as $membro)
                        <option  value="{{$membro->id}}">{{$membro->nome}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-primary" onclick="selecionaMembro()">Salvar</button>
                </div>
            </div>
        </div>
    </div>
    <!-- FIM MODAL ESCOLHER MEMBRO -->



    <script>
        //FUNÇÃO PARA SELECIONAR O MEMBRO - INSERE NOME E ID DO SELECIONADO
        function selecionaMembro() {

            /* FORMA ALTERNATIVA PARA A SELEÇÃO DO NOME E ID DO MEMBRO
            var nome = $("option[value="+membro+"]").text();*/

            var membro = $("#membroselect").val();
            var nome = $('#membroselect option:selected').text();
            $("#membronome").val(nome);
            $("#membroid").val(membro);
            $('#modalselecionar').modal('toggle');

        };

    </script>



@endsection