@extends('layouts.merge.site')
@section('titulo', ' Regulamentos')
@section('content')

    <!-- ====== Banner Start ====== -->
    <section class="ud-page-banner">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ud-banner-content">
                        <h1>Regulamentos</h1>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ====== Banner End ====== -->

    <!-- ====== estruture Start ====== -->
    <section class="ud-blog-details">
        <div class="container">
            <div class="row">

                @foreach ($regulamenets as $item)
                    <div class="col-12 col-md-6 mb-5">
                        <div class="row">

                            <div class="col-md-4">
                                <img src="/images/publish/doc.png" class="img-fluid" alt="">

                            </div>

                            <div class="col-md-8">

                                <h4 class="mb-2">{{ $item->title }}</h4>

                                <a href="/storage/{{ $item->file }}" target="_blank">
                                    <img src="/images/icons/pdf-icon.png" alt="">

                                    Clique aqui para download</a>

                            </div>

                        </div>

                    </div>
                @endforeach


            </div>
        </div>
    </section>
    <!-- ====== estruture End ====== -->


@endsection
