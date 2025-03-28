@extends('layouts.merge.site')
@section('titulo', 'Status da Prova')
@section('content')

    <!-- ====== Banner Start ====== -->
    <section class="ud-page-banner">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ud-banner-content">
                        <h1> Status da Prova</h1>
                        <P class="text-white">Para verificar o estado da sua candidatura, insira o seu nº do Bilhete de
                            Identidade</P>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ====== Banner End ====== -->

    <section class="ud-blog-grids my-5 py-5">
        <div class="container">

            <div class="col-12">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form class="row" action="{{ route('site.candidacy.show') }}">
                    @csrf



                    <div class="col-12 mb-3">
                        <label for="rcorners2" class="form-label">
                            <h3>Pesquisar</h3>
                        </label>
                    </div>



                    <div class="col-12 row">

                        <input type="text" id="rcorners2" placeholder="Digite o nº do Bilhete de Identidade"
                            value="{{ isset($search) ? $search : '' }}" name="search" required
                            class="form-control search py-2">
                        <button class="btn btn-primary" id="buttonbtn" type="submit">
                            <i class="lni lni-search"></i>
                        </button>

                    </div>


                </form>
            </div>
            @isset($candidacy)

                <div class="col-12 my-5">
                    <h4>
                        Estado do Candidato:
                        @if ($candidacy->status_exam == 'SELECIONADO')
                            <b class="text-success">{{ $candidacy->status_exam }}</b>
                        @elseif ($candidacy->status_exam == 'OK')
                            <b class="text-info">{{ $candidacy->status_exam }} (AGUARDE ATUALIZAÇÃO)...</b>
                        @else
                            <b class="text-danger">{{ $candidacy->status_exam }}</b>
                        @endif

                    </h4>
                </div>


                <div class="row col-12 mb-5">
                    <div class="row py-5">
                        <div class="col-md-4">
                            <hr>
                        </div>
                        <div class="col-md-4 text-center">
                            <b>Dados Pessoais</b>
                        </div>
                        <div class="col-md-4">
                            <hr>
                        </div>
                    </div>


                    <div class="col-md-6 col-lg-4 col-12">
                        <div class="form-group">
                            <label for="province_id">Província onde deseja Trabalhar</label>
                            <input type="text" class="form-control" value="{{ $candidacy->province->name }}"
                                name="province_id" id="province_id" disabled>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-4 col-12">
                        <div class="form-group">
                            <label for="county">Município onde deseja Trabalhar</label>
                            <input type="text" class="form-control" value="{{ $candidacy->county }}" name="county"
                                id="county" disabled>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-4 col-12">
                        <div class="form-group">
                            <label for="bi">Nº do Bilhete de Identidade <small class="text-danger">*</small></label>
                            <input type="text" class="form-control" placeholder="Ex:. 000123321LA000"
                                value="{!! $candidacy->bi ? $candidacy->bi : old('bi') !!}" name="bi" id="bi" disabled>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-8 col-12">
                        <div class="form-group">
                            <label for="fullname">Nome Completo <small class="text-danger">*</small></label>
                            <input type="text" class="form-control" value="{!! $candidacy->fullname ? $candidacy->fullname : old('fullname') !!}" name="fullname"
                                id="fullname" placeholder="Nome Completo" disabled>
                        </div>
                    </div>



                    <div class="col-md-6 col-lg-4 col-12">
                        <div class="form-group">
                            <label for="iban">IBAN <small>(International Bank Account Number)</small> <small
                                    class="text-danger">*</small></label>
                            <input type="text" class="form-control" value="{!! $candidacy->iban !!}"
                                placeholder="AO06.XXXX.0000.XXXX.XXXX.XXXX.X" name="iban" id="iban" disabled>

                        </div>
                    </div>


                </div>
            @else
                @isset($search)
                    <div class="col-12 my-3 py-5 text-center">
                        Infelizmente não encontramos nenhuma candidatura com esse nº de Bilhete de Identidade
                    </div>
                @endisset
            @endisset



        </div>

    </section>





    @isset($candidacy)


        @if (!is_null($candidacy->hph))
            @php
                $hphArray = json_decode($candidacy->hph);
            @endphp
            @if (is_array($hphArray) && count($hphArray) > 0)
                @foreach (json_decode($candidacy->hph) as $hph)
                    <script>
                        // Seleciona automaticamente as caixas de seleção com base nos valores de $hph
                        var hphValue = {!! json_encode($hph) !!};
                        $("input[type='checkbox'][value='" + hphValue + "']").prop("checked", true);
                    </script>
                @endforeach
            @endif

        @endif
    @endisset


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
    <script src="/js/data-geo.js"></script>

@endsection
