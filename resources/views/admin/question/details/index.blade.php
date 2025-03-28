@extends('layouts.merge.dashboard')
@section('titulo', 'Detalhes da Questão')

@section('content')
    <div class="card mb-2">
        <div class="card-body">
            <h2 class="h5 page-title">
                <a href="{{ route('admin.question.index') }}"><u>Listar Questões</u></a> > {{ $question->question }}
            </h2>
        </div>
    </div>
    <div class="card shadow">
        <div class="card-body">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-12">
                        <h2 class="h3 m-4 page-title">{{ $question->question }}</h2>
                        <div class="row m-5 align-items-center">

                            <div class="col">
                                <div class="row align-items-center">



                                    @php
                                        $i = 1;
                                    @endphp
                                    @foreach ($question->answers as $row)
                                        @if ($row->is_correct == 0)
                                            <div class="col-md-12 mb-2 bg-danger py-2">
                                                <h5 class="mb-1">
                                                    <b>Resposta nº {{ $i++ }}:</b><br>
                                                    {{ $row->answer }}

                                                </h5>
                                            </div>
                                        @else
                                            <div class="col-md-12 mb-2 bg-success py-2">
                                                <h5 class="mb-1">
                                                    <b>Resposta nº {{ $i++ }}:</b><br>
                                                    {{ $row->answer }}

                                                </h5>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>

                                <div class="row align-items-center">
                                    <div class="col-md-7 mb-2">
                                        <hr>
                                        <p class="mb-1 "><b>Data de Cadastro:</b> {{ $question->created_at }}
                                        </p>
                                        <p class="mb-1 "><b>Última Actualização:</b> {{ $question->updated_at }}
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
