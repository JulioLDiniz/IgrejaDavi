@extends('layouts.admin')
@section('content')
    <h1 class="text-center">Cadastro de membro</h1>
        <div style="padding: 35px;">
        {!! Form::open(['route'=>'membros.store', 'method'=>'post']) !!}
        @include('membros.forms.membros')
        {!!Form::submit('Registrar',['class'=>'btn btn-primary'])  !!}
        {!!Form::reset('Limpar',['class'=>'btn btn-warning'])  !!}
        {!! Form::close() !!}
        </div>


    @endsection