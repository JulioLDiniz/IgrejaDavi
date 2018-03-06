@extends('layouts.admin')
@section('title', 'Envio de E-mail')
@section('content')

    <h1 class="text-center">Enviar e-mail</h1>
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

    <form action="/mail-store" method="post" style="padding: 35px;">
        {{csrf_field()}}
        <div class="form-group">
            <label for="nome" class="col-form-label">Para: </label>
            <input type="email" name="para" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="mensagem" class="col-form-label">Mensagem:</label>
            <textarea name="mensagem" class="form-control" required> </textarea>
        </div>


        <button type="submit" class="btn btn-primary">Enviar</button>


    </form>

@endsection