@extends('layouts.merge.site')
@section('titulo', 'Pesquisar')
@section('content')

<!-- ====== Banner Start ====== -->
<section class="ud-page-banner">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="ud-banner-content">
                    <h1>Alguma Pergunta?</h1>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ====== Banner End ====== -->

<!-- ====== Publicações Start ====== -->
<section class="ud-blog-grids" style="margin-top:-70px;">
    <div class="container">


        <div class="col-lg-12">
            <form class="row" action="{{ route('site.search.find') }}">
                @csrf

                <input type="text" id="rcorners2" placeholder="Digite sua pesquisa..."
                    value="{{ isset($search) ? $search : '' }}" name="search" required
                    class="form-control search py-2">

                <button class="btn btn-primary" id="buttonbtn" type="submit"> <i class="lni lni-search"></i></button>

            </form>
            @if ($errors->any())
                <small class="mt-1 mb-4 text-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </small>
            @endif
            <div class="mt-2 mb-5" id="resultcount"> </div>
        </div>


        <div class="col-lg-12 mt-4">
            <div class="row">
                {{-- news --}}
                @isset($news)
                    @foreach ($news as $item)
                        <div class="col-12 my-2 line">
                            <a class="text-dark" href="{!! url('/noticia/' . urlencode($item->title)) !!}">
                                <b>{{ $item->title }}</b> <br>
                                <small>{!! html_entity_decode(mb_substr($item->body, 0, 250, 'UTF-8')) !!}</small>
                            </a>
                            <br>
                            <a href="{{ route('site.news') }}"><span class="badge bg-dark">Notícias</span></a>
                        </div>
                    @endforeach
                @endisset

                {{-- annonces --}}
                @isset($annonces)
                    @foreach ($annonces as $item)
                        <div class="col-12 my-2 line">
                            <a class="text-dark" href="{!! url('/anuncios/' . urlencode($item->title)) !!}">
                                <b>{{ $item->title }}</b> <br>
                                <small>{!! html_entity_decode(mb_substr($item->body, 0, 250, 'UTF-8')) !!}</small>
                            </a>
                            <br>
                            <a href="{{ route('site.announcent') }}"><span class="badge bg-dark">Anúncios</span></a>
                        </div>
                    @endforeach
                @endisset

                

                {{-- slideshows --}}
                @isset($slideshows)
                    @foreach ($slideshows as $item)
                        <div class="col-12 my-2 line">
                            <a class="text-dark" href="{{ $item->link }}">
                                <b>{{ $item->title }}</b>
                            </a>
                            <br>
                            <a href="{{ route('site.home') }}">
                                <span class="badge bg-dark">Notícias em Destaque</span>
                            </a>
                        </div>
                    @endforeach
                @endisset

                {{-- definitions --}}
                @isset($definitions)
                    <div class="col-12 my-2 line">
                        <a class="text-dark" href="{{ route('site.definition') }}">
                            <b>{{ $definitions->title }}</b> <br>
                            <small>{!! html_entity_decode(mb_substr($definitions->definicon, 0, 250, 'UTF-8')) !!}</small>
                        </a>
                        <br>
                        <a href="{{ route('site.definition') }}">
                            <span class="badge bg-dark">Definição do CENSO 2024</span>
                        </a>
                    </div>
                @endisset


            </div>
            {{-- <div class="col-12 mx-auto text-center">
                <button id="seemore" class="btn btn-outline-dark col-md-2" >Ver Mais</button>
            </div> --}}
        </div>

    </div>

</section>
    <!-- ====== find Start ====== -->


@endsection
@section('CSSJS')
    <style>
        #rcorners2 {
            width: 700px;
            height: 50px;
        }

        #buttonbtn {
            display: block;
            width: 50px;
            height: 50px;
            margin-left: -50px;
        }

    </style>
@endsection
@section('JS')
    <script src="/site/js/myscript.js"></script>
@endsection
