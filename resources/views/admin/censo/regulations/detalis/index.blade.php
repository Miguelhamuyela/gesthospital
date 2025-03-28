@extends('layouts.merge.dashboard')
@section('titulo', 'Detalhes da Regulamentos')

@section('content')
    <div class="card mb-2">
        <div class="card-body">
            <h2 class="h5 page-title">
                <a href="{{ route('admin.regulation.index') }}"><u>Listar regulamentos</u></a> > {{ $regulament->title }}
            </h2>
        </div>
    </div>
    <div class="card shadow">
        <div class="card-body">

            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-12">
                        <h2 class="h3 m-4 page-title">Titulo:{{ $regulament->title }}</h2>
                        <div class="row m-5 align-items-center">

                            <div class="col">
                                <div class="row align-items-center">

                                    <h3> <a href="/storage/{{ $regulament->file }}" target="_blank">Arquivo</a></h3>


                                </div>

                                <div class="row align-items-center">
                                    <div class="col-md-7 mb-2">
                                        <hr>
                                        <p class="mb-1 "><b>Data de Cadastro:</b>
                                            {{ $regulament->created_at }}
                                        </p>
                                        <p class="mb-1 "><b>Última Actualização:</b>
                                            {{ $regulament->updated_at }}
                                        </p>

                                    </div>
                                </div>
                            </div>
                        </div>



                    </div> <!-- /.col-12 -->
                </div> <!-- .row -->
            </div> <!-- .container-fluid -->

        </div>
    </div>





@endsection
