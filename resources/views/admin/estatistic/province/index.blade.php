@extends('layouts.merge.dashboard')
@section('titulo', 'Estatística - Candidaturas por Províncias')

@section('content')
    <div class="card mb-2">
        <div class="card-body">
            <h2 class="h5 page-title">
                Estatística - Candidaturas por Províncias
            </h2>
        </div>
    </div>
    <div class="card shadow pb-5">
        <div class="card-body">
            <div class="row">
                <div class="col-12">
                    <h3 class="text-center">Candidaturas por Províncias</h3>
                </div>
                <div class="col-12">
                    <div class="row">

                        @foreach ($candidacies as $province => $total)
                        <div class="col-12 col-md-6 col-xl-4 mb-4">
                            <div class="card shadow">
                                <div class="card-body">
                                    <div class="row align-items-center">
                                        <div class="col-3 text-center">
                                            <h4><b>   {{ $total }}</b></h4>
                                        </div>
                                        <div class="col pr-0">
                                            <p class="text-dark mb-0">{{ $province }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        @endforeach

                    </div>
                </div>

            </div>

        </div>
    </div>






@endsection
