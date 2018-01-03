@extends('layouts.admin')
@section('content')

    <select name="mes" id="mes">
        <option value="8">Agosto</option>
        <option value="9">Setembro</option>
        <option value="10">Outubro</option>
        <option value="11">Novembro</option>
        <option value="12">Dezembro</option>
    </select>
    {{--<button id="enviar">Enviar</button>--}}

    <img style="display: none" src="https://i.giphy.com/media/3oEjI6SIIHBdRxXI40/giphy.webp" id="loading">

    <canvas width="100%" height="30" class="line-chart"></canvas>

    <h1 class="array-vazio" style="display: none">Nada a declarar.</h1>



    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>

    <script>
    </script>



    <script>

        var ctx= document.getElementsByClassName("line-chart");

        var chartGraph = new Chart(ctx, {
            type: 'line',
            data: {
                labels: ["jan", "fev", "mar","abril","maio"],
                datasets:[{
                    label: 'Entrada do caixa',
                    data: [0,0,0,0,0],
                    borderWidth: 6,
                    borderColor: 'rgba(77,166,253,0.85)',
                    backgroundColor: 'transparent'
                },{
                    label: 'Saída do caixa',
                    data: [10,10,10,10,10],
                    borderWidth: 6,
                    borderColor: 'red',
                    backgroundColor: 'transparent'
                }
                ]
            }
        });



        $("#mes").change(function(){
            var dias = [];
            var valor = [];
            var valor2 = [];
            $(".line-chart").css("display", "none");
            $("#loading").css("display", "block");

            $.ajax({
                type: "POST",
                url: "{{ route('financas-mes-entrada') }}",
                data: {
                    _token: "{{ csrf_token() }}",
                    mes   : $(this).val()
                },
                success: function (data) {
                    if(data.length == null){
                        $(".line-chart").css("display", "none");
                        $(".array-vazio").css("display", "block");
                    }
                        for (var i=0; i <= data.entrada.length - 1; i++){


                            dias.push(data.entrada[i].date);
//                            valor.push(parseFloat(data.movimentacao[i].valor));

//                            console.log(data.movimentacao[i].date);
//                            console.log(dias[i]);
                            if(dias[i] === data.entrada[i].date || dias[i] === data.saida[i].date){
                                valor.push(parseFloat(data.entrada[i].soma));


                            }


                        }

                        chartGraph.data.datasets[0].data = valor;
                        chartGraph.data.labels = dias;
                        chartGraph.update();



                        $("#loading").css("display", "none");
                        $(".array-vazio").css("display", "none");
                        $(".line-chart").css("display", "block");


                }
            })
            //saida
            $.ajax({
                type: "POST",
                url: "{{ route('financas-mes-saida') }}",
                data: {
                    _token: "{{ csrf_token() }}",
                    mes   : $(this).val()
                },
                success: function (data) {
                    if(data.length == null){
                        $(".line-chart").css("display", "none");
                        $(".array-vazio").css("display", "block");
                    }
                    for (var i=0; i <= data.movimentacao.length - 1; i++){

                        for(var j=0;j<=dias.length;j++){
                            if(dias[j] === data.movimentacao[i].date){
                                console.log(dias[j]);
                            }

                        }

                            dias.push(data.movimentacao[i].date);
                            valor2.push(parseFloat(data.movimentacao[i].soma));

//                            console.log(data.movimentacao[i].date);
                            console.log(dias[i]);
                            if(dias[i] === data.movimentacao[i].date){
                                valor2.push(parseFloat(data.movimentacao[i].soma));

                            }




                    }

                    chartGraph.data.datasets[1].data = valor2;
                    chartGraph.data.labels = dias;
                    chartGraph.update();



                    $("#loading").css("display", "none");
                    $(".array-vazio").css("display", "none");
                    $(".line-chart").css("display", "block");


                }
            })
        });

        {{--$("#enviar").click(function(){--}}
            {{--$.ajax({--}}
                {{--type: "POST",--}}
                {{--url: "{{ route('financas-mes') }}",--}}
                {{--data: {--}}
                    {{--_token: "{{ csrf_token() }}",--}}
                    {{--mes   : '11'--}}
                {{--},--}}
                {{--success: function (data) {--}}
                    {{--for (var i=0; i <= data.movimentacao.length - 1; i++){--}}
                        {{--dias.push(data.movimentacao[i].date);--}}
                        {{--valor.push(parseInt(data.movimentacao[i].valor));--}}
                    {{--}--}}

                    {{--chartGraph.data.datasets[0].data = valor;--}}
                    {{--chartGraph.data.labels = dias;--}}
                    {{--chartGraph.update();--}}
                {{--}--}}
            {{--})--}}
        {{--});--}}


    </script>

@endsection