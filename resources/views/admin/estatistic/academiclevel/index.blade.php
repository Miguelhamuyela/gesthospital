@extends('layouts.merge.dashboard')
@section('titulo', 'Estatística - Candidaturas por Nível Acadêmico')

@section('content')
    <div class="card mb-2">
        <div class="card-body">
            <h2 class="h5 page-title">
                Estatística - Candidaturas por Nível Acadêmico
            </h2>
        </div>
    </div>
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="row">
                <div class="container">
                    <h3 class="text-center">Estatística - Candidaturas por Nível Acadêmico</h3>
                </div>

                <div class="col-12">

                    <canvas id="myChart" style="width:100%;max-width:1900px"></canvas>
                </div>

            </div>

        </div>
    </div>

    <script>
        var EMC = JSON.parse('<?php echo $EMC; ?>');
        var FU = JSON.parse('<?php echo $FU; ?>');
        var FUC = JSON.parse('<?php echo $FUC; ?>');


        var xValues = ["Ensino Médio Concluído", "Frequência Universitária", "Formação Universitária Concluída"];
        var yValues = [EMC, FU, FUC];
        var barColors = [
            "#ffc234",
            "#36a2eb",
            "#5225e8",
        ];

        new Chart("myChart", {
            type: "pie",
            data: {
                labels: xValues,
                datasets: [{
                    backgroundColor: barColors,
                    data: yValues
                }]
            },
            options: {
                title: {
                    display: true,
                    text: ""
                },

            }
        });
    </script>




@endsection
