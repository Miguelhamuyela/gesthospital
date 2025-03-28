@extends('layouts.merge.dashboard')
@section('titulo', 'Estatística - Estado das Candidaturas')

@section('content')
    <div class="card mb-2">
        <div class="card-body">
            <h2 class="h5 page-title">
                Estatística - Estado das Candidaturas
            </h2>
        </div>
    </div>
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="row">

                <div class="col-12">
                    <h3 class="text-center">Estado das Candidaturas </h3>
                    <canvas id="chartId" aria-label="chart" height="470" width="1100">

                </div>

            </div>

        </div>
    </div>


    <script>
        var RECEBIDO = JSON.parse('<?php echo $RECEBIDO; ?>');
        var APROVADO = JSON.parse('<?php echo $APROVADO; ?>');
        var IMPRESSO = JSON.parse('<?php echo $IMPRESSO; ?>');
        var NAOAPROVADO = JSON.parse('<?php echo $NAOAPROVADO; ?>');
        var total = JSON.parse('<?php echo $total; ?>');


        var chrt = document.getElementById("chartId").getContext("2d");
        var chartId = new Chart(chrt, {
            type: 'bar',
            data: {
                labels: ["AGUARDA AVALIAÇÃO", "APROVADO", "IMPRESSO",
                    "NAOAPROVADO", " Total de Candidaturas"
                ],
                datasets: [{
                    label: 'Total de Candidaturas',

                    data: [RECEBIDO, APROVADO, IMPRESSO, NAOAPROVADO, total],
                    backgroundColor: ['black', 'green', 'blue', 'red', 'grey'],
                    borderWidth: 2,
                }],
            },
            options: {
                responsive: true,
            },
        });
    </script>




@endsection
