@extends('layouts.merge.site')
@section('titulo', 'Verificação do BI '. $candidacy->bi)
@section('content')

    <!-- ====== Banner Start ====== -->
    <section class="ud-page-banner">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ud-banner-content">
                        <h1> {!! $candidacy->status == 'AGUARDA AVALIAÇÃO' ? 'Informação do Candidato' : 'Informação do Agente' !!} </h1>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ====== Banner End ====== -->

    <section class="ud-blog-grids my-5 py-5">
        <div class="container">
            <div class="row">
                <div class="col-12">

                    <h2 class="text-center">{{ $candidacy->fullname }}</h2>
                    <h4 class="text-center">
                        {{ date('d/m/Y', strtotime($candidacy->birthdate)) }} -
                        {{ date('Y') - date('Y', strtotime($candidacy->birthdate)) }} anos

                    </h4>
                    <div class="col-12 col-md-4 col-lg-4 mx-auto mt-4">
                        <img src="/storage/{{ $candidacy->photo }}" width="100%">
                    </div>
                </div>
            </div>
        </div>

    </section>



@endsection
