@extends('layouts.merge.site')
@section('titulo', ' Notícias')
@section('content')
    <!-- ====== Banner Start ====== -->
    <section class="ud-page-banner">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ud-banner-content">
                        <h1>Notícias</h1>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ====== Banner End ====== -->

    <!-- ====== news Start ====== -->
    <section class="ud-blog-grids" style="margin-top:-70px;">
        <div class="container">
            <div class="row">

                @foreach ($news as $item)
                    <div class="col-lg-4 col-md-6">
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
                                <br>
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
            <div class="row justify-content-center">
                <div class="col-md-4">
                    <h6>{{ $news->links() }}</h6>
                </div>
            </div>
        </div>
    </section>
    <!-- ====== news End ====== -->


@endsection
