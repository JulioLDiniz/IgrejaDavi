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
    <h1 class="text-center" style="font-family: Helvetica">Relatório de Finanças</h1>
                <table class="table table-striped">
                    <thead class="thead-dark">
                    <tr>
                        <th>Finalidade</th>
                        <th>Valor</th>
                        <th>Data</th>
                        <th >Observações</th>
                        <th>Tipo</th>
                        <th>Membro</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($financas as $financa)
                        <tr>
                            <td>{{$financa->finalidade}}</td>
                            <td>R${{$financa->valor}}</td>
                            <td>{{\Carbon\Carbon::createFromFormat("Y-m-d", $financa->date)->format("d/m/Y")}}</td>
                            <td >{{$financa->observacoes}}</td>
                            @if($financa->movimentacao == 'entrada')
                                <td class="table-success">{{$financa->movimentacao}}</td>
                            @else
                                <td class="table-danger">{{$financa->movimentacao}}</td>
                            @endif
                            <td >{{$financa->membronome}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
</body>
</html>
