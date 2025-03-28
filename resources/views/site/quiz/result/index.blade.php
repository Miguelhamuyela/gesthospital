@extends('layouts.merge.site')
@section('titulo', 'Fim da Minha Prova')
@section('content')

    <!-- ====== Banner Start ====== -->
    <section class="ud-page-banner">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ud-banner-content">
                        <h1> Fim da Minha Prova</h1>

                    </div>
                </div>
            </div>


            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header"><h2>{{ __('Obrigado por completar a prova!') }}</h2></div>

                        <div class="card-body">
                            <p>Suas respostas foram salvas com sucesso.</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- ====== Banner End ====== -->


@endsection
