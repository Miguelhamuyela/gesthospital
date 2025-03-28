@extends('layouts.merge.site')
@section('titulo', 'Candidaturas')
@section('content')
    <!-- ====== Slideshow Start ====== -->
    <div class="carousel">
        @if ($slideshows)
            @foreach ($slideshows as $item)
                <div
                    style='
                            background-position:center;
                            background-size:cover;
                            height:850px;
                            width:100%;
                            background-image: url("/storage/{{ $item->path }}"); box-shadow: inset 0 0 0 1000px rgba(0, 0, 0, 0.5);'>
                    <div class="ud-hero-content" style="margin-top: 90px;padding-top:270px;">
                        @if ($item->title)
                            <h2 class="ud-hero-title" style="text-shadow: 1px 1px #000; font-size:35px;">
                                {{ $item->title }}
                            </h2>
                        @endif
                        @if ($item->link)
                            <ul class="ud-hero-buttons">
                                <a href="{{ $item->link }}" class="ud-main-btn ud-link-btn">
                                    {{ $item->button }} <i class="lni lni-arrow-right"></i>
                                </a>
                            </ul>
                        @endif
                    </div>
                </div>
            @endforeach
        @endif
    </div>
    <!-- ====== Slideshow End ====== -->


@include('extra._countdown.index')
<!-- ====== Slideshow End ====== -->

<!-- ====== NEWS Start ====== -->
<section id="NEWS" class="ud-features" style="margin-top:-90px;margin-bottom:-130px;">
    <div class="container">

        <div class="row">
            @foreach ($news as $item)
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
            <center>

                <a href="{{ route('site.news') }}" class="ud-main-btn ud-link-btn mb-5">
                    Ver mais <i class="lni lni-arrow-right"></i>
                </a>
            </center>

        </div>
    </div>
</section>
<!-- ====== NEWS End ====== -->



<!-- ====== IMPRESSOS Start ====== -->
<section id="Publicações" class="ud-features">
    <div class="container">

        <div class="col-lg-12" style="margin-bottom:-50px;">

            <div class="ud-section-title">
                <h2 style="font-size:35px;">Publicações</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-6 col-lg-6 col-sm-6">

                <div class="ud-single-feature wow fadeInUp" data-wow-delay=".15s">

                    <a href="{{ route('site.profile') }}" class="card-img-top img-fluid rounded"
                        style='background-image:url("/images/publish/section-01.png");background-position:center;background-size:cover;height:300px;'>
                    </a>

                    <div class="ud-feature-content">

                        <a href="{{ route('site.profile') }}">
                            <h3 class="ud-feature-title">Perfil do Agente de Campo (Recenseador/Supervisor)</h3>
                        </a>

                    </div>

                </div>

            </div>

            <div class="col-xl-6 col-lg-6 col-sm-6">


                <div class="ud-single-feature wow fadeInUp" data-wow-delay=".15s">

                    <a href="#" class="card-img-top img-fluid rounded"
                        style='background-image:url("/images/publish/section-02.png");background-position:center;background-size:cover;height:300px;'
                        data-bs-toggle="modal" data-bs-target="#myModal2">
                    </a>

                    <div class="ud-feature-content">
                        <a href="#" data-bs-toggle="modal" data-bs-target="#myModal2">
                            <h3 class="ud-feature-title">Juntos Contamos por Angola! Censo 2024</h3>
                        </a>

                        <div class="modal" id="myModal2">
                            <div class="modal-dialog modal-xl  modal-fullscreen-md-down">
                                <div class="modal-content">
                                    <div class="modal-header bg-primary ">
                                        <h5 class="modal-title text-white">Juntos Contamos por Angola! Censo 2024</h5>
                                        <button type="button" class="btn-close bg-white"
                                            data-bs-dismiss="modal"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div style="height: 450px;width:100%;">
                                            <iframe
                                                src="https://www.facebook.com/plugins/video.php?height=316&href=https%3A%2F%2Fwww.facebook.com%2Fine.gov.ao%2Fvideos%2F945499040621969%2F&show_text=false&width=560&t=0"
                                                width="100%" height="100%" style="border:none;overflow:hidden"
                                                scrolling="no" frameborder="0" allowfullscreen="true"
                                                allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"
                                                allowFullScreen="true"></iframe>
                                        </div>

                                    </div>

                                </div>
                            </div>

                        </div>


                    </div>

                </div>

            </div>



        </div>
    </div>
</section>
<!-- ====== IMPRESSOS End ====== -->

<!-- ====== map Start ====== -->
<section id="map" class="ud-map mb-5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-12" style="margin-bottom:-50px;">
                <div class="ud-section-title">
                    <h3 style="">Recrutamento de Agentes de Campo do Censo 2024</h3>

                </div>
            </div>
        </div>
        @include('extra.map.index')
    </div>
</section>
<!-- ====== map End ====== -->

<script>
    $('.carousel').slick({
        dots: false,
        slidesToShow: 1,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 3000,
    });
</script>

@endsection
@section('CSSJS')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.7.1/slick.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.7.1/slick-theme.css" />

<script src="https://code.jquery.com/jquery-1.11.0.min.js"></script>
<script src="https://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.7.1/slick.js"></script>
@endsection
