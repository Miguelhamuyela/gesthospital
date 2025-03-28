@extends('errors::minimal')

@section('titulo', )
@section('code', '403')
@section('message',)




@extends('layouts.merge.site')
@section('titulo', __('Forbidden'))
@section('content')

    <!-- ====== Banner Start ====== -->
    <section class="ud-page-banner">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ud-banner-content">
                        <h1>403</h1>
                        <p class="text-white">Não conseguimos encontrar essa página</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ====== Banner End ====== -->

    <!-- ====== Error 404 Start ====== -->
    <section class="ud-404">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ud-404-wrapper">
                        <div class="ud-404-content">
                            <h2 class="ud-404-title">{!!  __($exception->getMessage() ?: 'Forbidden') !!}</h2>
                            
                            <ul class="ud-404-links">
                                <li>
                                    <a href="{{ route('site.home') }}">Home</a>
                                </li>
                                <li>
                                    <a href="{{ url('contactos') }}">Suporte</a>
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
