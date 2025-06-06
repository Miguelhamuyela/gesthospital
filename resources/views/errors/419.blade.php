@extends('layouts.merge.site')
@section('titulo', 'Error 419')
@section('content')
    <!-- ====== Banner Start ====== -->
    <section class="ud-page-banner">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ud-banner-content">
                        <h1>419</h1>
                        <p class="text-white">Erro a Sua sessão Expirou, actualize a pagina!</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ====== Banner End ====== -->

    <!-- ====== Error 419 Start ====== -->
    <section class="ud-404">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ud-404-wrapper">
                        <div class="ud-404-content">
                            <h2 class="ud-404-title">419 - Erro a Sua sessão Expirou, actualize a pagina!.</h2>
                            <h5 class="ud-404-subtitle">Talvez você possa encontrar o que precisa aqui?
                            </h5>
                            <ul class="ud-404-links">
                                <li>
                                    <a href="{{ route('site.home') }}">Home</a>
                                </li>
                                <li>
                                    <a href="{{ route('site.contact') }}">Suporte</a>
                                </li>
                                <li>
                                    <a href="{{ route('site.news') }}">Últimas Notícias</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ====== Error 404 End ====== -->

@endsection
