@extends('layouts.merge.site')
@section('titulo', 'Candidaturas')
@section('content')
    <!-- ====== Banner Start ====== -->
    <section class="ud-page-banner">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ud-banner-content">

                        <h1>Candidaturas</h1>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ====== Banner End ====== -->

    <section class="ud-blog-grids mb-5 pt-5">
        <div class="container">
            <div class="row">


                <div class="col-12">

                    <div class="col-12 alert alert-info mb-5">

                        <p>
                            <b>NOTA:</b> <br>
                            1. Disponibilidade imediata e a tempo inteiro para participar nas formações e na recolha de
                            dados, incluindo o final de semana e feriados. <br>
                            2. Ser residente e conhecer bem a zona geográfica para a qual se candidata; <br>
                            3. Conhecer bem a língua local é uma vantagem; <br>
                            4. Possuir um correio electrónico é obrigatório; <br>
                            <b class="text-danger">
                                5. O IBAN deve estar associado ao nome do Candidato, não será aceito IBAN em nome de outra pessoa <br>
                                6. Será automaticamente desqualificado se prestar falsas declarações!</b> <br>
                            7. O prazo para a correção da candidatura é de até 48 horas <br>
                            8. (<b class="text-danger">*</b>) - Campo Obrigatório
                        </p>
                    </div>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif


                    <form method="POST" enctype="multipart/form-data" action="{{ route('site.candidacy.store') }}"
                        class="row mt-0 pt-0">
                        @csrf

                        @include('forms._formCandidacy.index')
                        <div class="col-12">
                            <div class="mt-5 text-center">
                                <button class="btn btn-primary col-md-3 col-12 py-3" type="submit">
                                    Submeter
                                </button>
                            </div>
                        </div>

                    </form>

                </div>

            </div>




        </div>

    </section>


@endsection
@section('JS')
    @if (!session('candidacyCreate'))
        <script>
            Swal.fire({
                icon: 'info',
                title: 'Tem a certeza de que leu o Perfil Requisitado minuciosamente?',
                text: 'Leia os Termos de Referência e o Perfil Requisitado antes de submeter a sua candidatura.',
                showConfirmButton: true,
            })
        </script>
    @endif
    <script src="/js/data-geo.js"></script>
@endsection
