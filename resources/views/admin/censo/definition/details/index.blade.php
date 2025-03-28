@extends('layouts.merge.dashboard')
@section('titulo', 'Ver Definições')

@section('content')
    <div class="card mb-2">
        <div class="card-body">

            <div class="col-md-12">
                <div class="row align-items-center">
                    <div class="col">
                        <h2 class="h5 page-title">
                            Definições
                        </h2>
                    </div>
                    <div class="col-auto">
                        @isset($definitions)
                            <a type="button" class="btn btn-sm btn-primary text-white"
                                href="{{ url("admin/censo/definition/edit/{$definitions->id}") }}">
                                <span class="fe fe-edit fe-16 mr-2"></span>Editar o Texto
                            </a>
                        @endisset
                    </div>
                </div>
            </div>

        </div>
    </div>
    @isset($definitions)


        <div class="card shadow">
            <div class="card-body">

                <div class="container-fluid">
                    <div class="row m-4">
                        <div class="col-md-12 mb-2">

                            <b>Titulo:</b>
                            <p class="mb-1 ">
                                <h4> {{ $definitions->title }}</h4>
                            </p>
                        </div>
                        <div class="col-md-12 mb-2">

                            <b>Corpo:</b><br>
                            <p class="mb-1 ">
                                {!! html_entity_decode($definitions->definicon) !!}
                            </p>
                        </div>

                    </div> <!-- .row -->
                    <div class="row align-items-center">
                        <div class="col-md-7 mb-2">
                            <hr>
                            <p class="mb-1 "><b>Data de Cadastro:</b> {{ $definitions->created_at }}
                            </p>
                            <p class="mb-1 "><b>Última Actualização:</b> {{ $definitions->updated_at }}
                            </p>

                        </div>
                    </div>
                </div> <!-- .container-fluid -->
            </div>
        </div>
    @endisset


@endsection
