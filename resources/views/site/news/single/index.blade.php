@extends('layouts.merge.site')
@section('titulo', ' Notícia')
@section('content')

    <!-- ====== Banner Start ====== -->
    <section class="ud-page-banner">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ud-banner-content">
                        <a href="{{ route('site.news') }}">
                            <h1 class="text-white">Notícias</h1>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ====== Banner End ====== -->

    <!-- ====== news Details Start ====== -->
    <section class="ud-blog-details">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="col-lg-12" style="margin-top: -50px; margin-bottom: 20px;">
                        <h3 class="text-dark">{{ $news->title }}</h3>
                    </div>
                    <div class="ud-blog-details-image">
                        <img src="/storage/{{ $news->path }}" alt="{{ $news->title }}" />
                        <div class="ud-blog-overlay">
                            <div class="ud-blog-overlay-content">
                                <div class="ud-blog-author">
                                    <img src="/site/images/blog/author-01.png" alt="author" />
                                    <span>{{ $news->typewriter }}</span>
                                </div>

                                <div class="ud-blog-meta">
                                    <p class="date">
                                        <i class="lni lni-calendar"></i>
                                        <span>{{ \Carbon\Carbon::parse($news->date)->locale('pt_BR')->isoFormat('D [de] MMMM [de] YYYY') }}</span>
                                    </p>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-12">
                    <div class="ud-blog-details-content">


                        <div style="text-align:justify;" class="text-justify ud-blog-details-para">
                            {!! html_entity_decode($news->body) !!}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ====== news Details End ====== -->

    <!-- ====== news Start ====== -->
    <section class="ud-blog-grids ud-related-articles">
        <div class="container">
            <div class="row col-lg-12">
                <div class="ud-related-title">
                    <h2 class="ud-related-articles-title">Outras Notícias</h2>
                </div>
            </div>
            <div class="row">

                @foreach ($lasted as $item)
                    <div class="col-lg-3 col-md-6">
                        <div class="ud-single-blog">
                            <div class="ud-blog-image">
                                <a href="{!! url('/noticia/' . urlencode($item->title)) !!}">
                                    <div class="card-img-top img-fluid rounded"
                                        style='background-image:url("/storage/{{ $item->path }}");background-position:center;background-size:cover;height:200px;'>
                                    </div>
                                </a>
                            </div>

                            <div class="ud-blog-content" style="margin-top:-20px;">
                                <span class="ud-blog-date bg-primary">{{ date('d/m/Y', strtotime($item->date)) }}</span>

                                <a href="{!! url('/noticia/' . urlencode($item->title)) !!}">
                                    <h5 class="text-dark">
                                        {{ $item->title }}

                                    </h5>
                                </a>

                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </section>
    <!-- ====== news End ====== -->



@endsection
