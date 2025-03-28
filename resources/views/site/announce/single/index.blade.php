@extends('layouts.merge.site')
@section('titulo', ' Anúncios')
@section('content')

    <!-- ====== Banner Start ====== -->
    <section class="ud-page-banner">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ud-banner-content">
                        <a href="{{ route('site.announcent') }}">
                            <h1>Anúncios</h1>
                        </a>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ====== Banner End ====== -->

    <!-- ====== annonce Details Start ====== -->
    <section class="ud-blog-details">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="col-lg-12" style="margin-top: -50px; margin-bottom: 20px;">
                        <h3 class="text-dark">{{ $annonce->title }}</h3>
                    </div>
                    <div class="ud-blog-details-image">
                        <img src="/storage/{{ $annonce->path }}" alt="{{ $annonce->title }}" />
                        <div class="ud-blog-overlay">
                            <div class="ud-blog-overlay-content">

                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-12">
                    <div class="ud-blog-details-content">
                       
                        <div style="text-align:justify;" class="ud-blog-details-para text-justify">
                            {!! html_entity_decode($annonce->body) !!}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ====== annonce Details End ====== -->

    <!-- ====== annonce Start ====== -->

    @if (count($lasted) > 0)
        <section class="ud-blog-grids ud-related-articles">
            <div class="container">
                <div class="row col-lg-12">
                    <div class="ud-related-title">
                        <h2 class="ud-related-articles-title">Últimos Anúncios</h2>
                    </div>
                </div>
                <div class="row">

                    @foreach ($lasted as $item)
                        <div class="col-lg-4 col-md-6">
                            <div class="ud-single-blog">
                                <div class="ud-blog-image">
                                    <a href="{!! url('/anuncio/' . urlencode($item->title)) !!}">
                                        <div class="card-img-top img-fluid rounded"
                                            style='background-image:url("/storage/{{ $item->path }}");background-position:center;background-size:cover;height:200px;'>
                                        </div>
                                    </a>
                                </div>
                                <div class="ud-blog-content">
                                    <span
                                        class="ud-blog-date bg-primary">{{ date('d M, Y', strtotime($item->date)) }}</span>
                                    <a href="{!! url('/anuncio/' . urlencode($item->title)) !!}">
                                        <h5 class="text-dark">
                                            {{ $item->title }}
                                        </h5>
                                    </a>
                                    <p class="ud-blog-desc">
                                        {{ $item->subtitle }}
                                    </p>
                                </div>
                            </div>
                        </div>

                    @endforeach

                </div>
            </div>
        </section>
    @endif
    <!-- ====== annonce End ====== -->



@endsection
