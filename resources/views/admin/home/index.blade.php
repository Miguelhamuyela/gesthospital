@extends('layouts.merge.dashboard')
@section('titulo', 'Painel do Recenseamento Geral da População e da Habitação')
@section('content')


    <div class="card mb-2">
        <div class="card-body">
            <h2 class="h5 page-title">
                Painel do Recenseamento Geral da População e da Habitação - <b>RGPH</b> <br>
                <small>Painel Administrativo</small>
            </h2>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6 col-xl-3 mb-4">
            <div class="card shadow bg-primary text-white">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-3 text-center">
                            <span class="circle circle-sm bg-primary-light">
                                <i class="fe fe-16 fe-rss text-white mb-0"></i>
                            </span>
                        </div>
                        <div class="col pr-0">
                            <p class="small text-light mb-0">Notícias</p>
                            <span class="h3 mb-0 text-white">{{ $count_news }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-xl-3 mb-4">
            <div class="card shadow">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-3 text-center">
                            <span class="circle circle-sm bg-primary">
                                <i class="fe fe-16 fe-users text-white mb-0"></i>
                            </span>
                        </div>
                        <div class="col pr-0">
                            <p class="small  mb-0">Candidaturas Nacionais</p>
                            <span class="h3 mb-0 ">{{ $count_candidacy }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-xl-3 mb-4">
            <div class="card shadow">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-3 text-center">
                            <span class="circle circle-sm bg-primary">
                                <i class="fe fe-16 fe-users text-white mb-0"></i>
                            </span>
                        </div>
                        <div class="col pr-0">
                            <p class="small  mb-0">Candidaturas Luanda</p>
                            <span class="h3 mb-0">{{ $count_candidacy_P11 }}</span>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-xl-3 mb-4">
            <div class="card shadow bg-primary text-white">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-3 text-center">
                            <span class="circle circle-sm bg-primary-light">
                                <i class="fe fe-16 fe-users text-white mb-0"></i>
                            </span>
                        </div>
                        <div class="col pr-0">
                            <p class="small text-light mb-0">Utilizadores</p>
                            <span class="h3 mb-0 text-white">{{ $count_user }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>



    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h2 class="h5 page-title">
                        Estatística - Candidaturas por Províncias
                    </h2>


                </div>
            </div>
        </div>

    </div>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <canvas id="candidaciesChart" width="400" height="200"></canvas>
                </div>
            </div>
        </div>

    </div>


    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        var ctx = document.getElementById('candidaciesChart').getContext('2d');
        var chartData = @json($candidaciesByProvince);

        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: chartData.labels,
                datasets: [{
                    label: 'Candidaturas por Província',
                    data: chartData.data,
                    backgroundColor: 'rgba(54, 162, 235, 0.6)', // Cor do fundo das barras
                    borderColor: 'rgba(54, 162, 235, 1)', // Cor da borda das barras
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true // Começar o eixo Y em 0
                    }
                }
            }
        });
    </script>
@endsection
