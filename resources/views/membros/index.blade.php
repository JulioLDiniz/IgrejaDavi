@extends('layouts.admin')
@section('content')
        <h1 class="text-center">Listagem de Membros</h1>
        @if(Session::has('message'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <p class="text-center">{{Session::get('message')}}</p>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

        @endif
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Telefone</th>
                        <th>E-mail</th>
                        <th >Data de Nascimento</th>
                        <th>Opções</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($membros as $membro)
                        <tr>
                            <td>{{$membro->nome}}</td>
                            <td>{{$membro->telefone}}</td>
                            <td>{{$membro->email}}</td>
                            <td >{{\Carbon\Carbon::createFromFormat("Y-m-d", $membro->dtnasc)->format("d/m/Y")}}</td>
                            <td class="text-center">
                                <a href="#" style="padding:30px;"><i class="fa fa-pencil" aria-hidden="true" data-toggle="modal" data-target="#alterar"
                                               data-whatevernome="{{$membro->nome}}"
                                               data-whatevertelefone="{{$membro->telefone}}"
                                               data-whateveremail="{{$membro->email}}"
                                               data-whateverdtnasc="{{ $membro->dtnasc }}"
                                               data-whateverid="{{$membro->id}}"></i></a>
                                <a href="#"><i class="fa fa-trash" aria-hidden="true" data-toggle="modal" data-target="#excluir"
                                               data-whatevernome="{{$membro->nome}}"
                                               data-whatevertelefone="{{$membro->telefone}}"
                                               data-whateveremail="{{$membro->email}}"
                                               data-whateverdtnasc="{{$membro->dtnasc}}"
                                               data-whateverid="{{$membro->id}}"></i></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>


        <!--MODAL ALTERAR-->
        <div class="modal fade" id="alterar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Alterar Membro</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{route('alterar') }}" method="post">
                            {{csrf_field()}}

                            <input type="hidden" readonly class="form-control" id="id" name="id" >
                            <div class="form-group">
                                <label for="nome" class="col-form-label">Nome:</label>
                                <input type="text" class="form-control" required id="nome" name="nome" >
                            </div>
                            <div class="form-group">
                                <label for="telefone" class="col-form-label">Telefone:</label>
                                <input type="text" class="telefone form-control" required name="telefone" id="telefone" >
                            </div>
                            <div class="form-group">
                                <label for="email" class="col-form-label">E-mail:</label>
                                <input type="email" class="form-control" required name="email" id="email">
                            </div>
                            <div class="form-group">
                                <label for="dtnasc" class="col-form-label">Data de Nascimento:</label>
                                <input type="date" class="form-control" required name="dtnasc" id="dtnasc">
                            </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Alterar</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        <!--FIM MODAL ALTERAR-->

        <!--MODAL EXCLUIR-->
        <div class="modal fade" id="excluir" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Excluir Membro</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('excluir') }}" method="post">
                            {{csrf_field()}}

                            <input type="hidden" readonly class="form-control" id="id" name="id" >
                            <div class="form-group">
                                <label for="nome" class="col-form-label">Nome:</label>
                                <input type="text" readonly class="form-control" id="nome" name="nome" >
                            </div>
                            <div class="form-group">
                                <label for="telefone" class="col-form-label">Telefone:</label>
                                <input type="text" readonly class="telefone form-control" name="telefone" id="telefone" >
                            </div>
                            <div class="form-group">
                                <label for="email" class="col-form-label">E-mail:</label>
                                <input type="email" readonly class="form-control" name="email" id="email">
                            </div>
                            <div class="form-group">
                                <label for="dtnasc" class="col-form-label">Data de Nascimento:</label>
                                <input type="text" readonly class="form-control" name="dtnasc" id="dtnasc">
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



              $('#alterar').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget) // Button that triggered the modal
                var nome = button.data('whatevernome')
                var telefone = button.data('whatevertelefone')
                var email = button.data('whateveremail')
                var dtnasc = button.data('whateverdtnasc')
                var id = button.data('whateverid')


                // Extract info from data-* attributes
                // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
                // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
                var modal = $(this)
                modal.find('.modal-title').text('Alterar Membro ' + nome)
                modal.find('.modal-body input#nome').val(nome)
                modal.find('.modal-body input#telefone').val(telefone)
                modal.find('.modal-body input#email').val(email)
                modal.find('.modal-body input#dtnasc').val(dtnasc)
                modal.find('.modal-body input#id').val(id)
            });



              $('#excluir').on('show.bs.modal', function (event) {
                  var button = $(event.relatedTarget) // Button that triggered the modal
                  var nome = button.data('whatevernome')
                  var telefone = button.data('whatevertelefone')
                  var email = button.data('whateveremail')
                  var dtnasc = button.data('whateverdtnasc')
                  var id = button.data('whateverid')


                  // Extract info from data-* attributes
                  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
                  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
                  var modal = $(this)
                  modal.find('.modal-title').text('Excluir Membro ' + nome)
                  modal.find('.modal-body input#nome').val(nome)
                  modal.find('.modal-body input#telefone').val(telefone)
                  modal.find('.modal-body input#email').val(email)
                  modal.find('.modal-body input#dtnasc').val(dtnasc)
                  modal.find('.modal-body input#id').val(id)
              });
        </script>





    @endsection