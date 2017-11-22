<div class="form-group">
    {!! Form::label('Nome:') !!}
    {!! Form::text('nome',null,['class'=>'form-control', 'placeholder'=>'Nome do membro','required']) !!}
</div>
<div class="form-group">
    {!! Form::label('Telefone:') !!}
    {!! Form::text('telefone',null,['class'=>'telefone form-control','placeholder'=>'Telefone do membro','required']) !!}
</div>
<div class="form-group">
    {!! Form::label('E-mail:') !!}
    {!! Form::email('email',null,['class'=>'form-control','placeholder'=>'E-mail do membro','required']) !!}
</div>
<div class="form-group">
    {!! Form::label('Data de Nascimento:') !!}
    {!! Form::date('dtnasc',null,['class'=>'form-control','placeholder'=>'Data de nascimento','required']) !!}
</div>