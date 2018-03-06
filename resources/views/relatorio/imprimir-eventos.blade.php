<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Bootstrap core CSS-->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom fonts for this template-->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
</head>
<body>
<h1 class="text-center" style="font-family: Helvetica">Relatório de Eventos</h1>
<table class="table table-striped">
    <thead class="thead-dark">
    <tr>
        <th>Título</th>
        <th>Tipo</th>
        <th>Data</th>
        <th >Observações</th>
        <th>Status</th>
    </tr>
    </thead>
    <tbody>

    @foreach($eventos as $evento)
        <tr>
            <td>{{$evento->titulo}}</td>
            <td>{{ucfirst($evento->tipo)}}</td>
            <td>{{\Carbon\Carbon::createFromFormat("Y-m-d", $evento->dataevento)->format("d/m/Y")}}</td>
            <td>{{$evento->observacoes}}</td>
            @if($evento->status == 'Em aberto')
                <td class="table-success">{{$evento->status}}</td>
            @elseif($evento->status == 'Em andamento')
                <td class="table-warning">{{$evento->status}}</td>
            @elseif($evento->status == 'Encerrado')
                <td class="table-danger">{{$evento->status}}</td>
            @endif
        </tr>
    @endforeach

    </tbody>
</table>
</body>
</html>
