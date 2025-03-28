@extends('layouts.merge.dashboard')
@section('titulo', 'Detalhes da Candidatura')

@section('content')
    <div class="card mb-2">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="h5 page-title">
                        <a href="{{ route('admin.candidacy.approved.index') }}"><u>Lista de Candidaturas</u></a> >
                        {{ $candidacy->fullname }}
                    </h2>

                </div>

            </div>

        </div>
    </div>
    <div class="card shadow">
        <div class="card-body">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <h3 class="mx-5 mt-5 page-title">Nome: {{ $candidacy->fullname }}</h3>
                        <h4 class="mx-5">
                            Estado:
                            @if ($candidacy->status == 'APROVADO')
                                <b class="text-success">{{ $candidacy->status }}</b>
                            @elseif ($candidacy->status == 'IMPRESSO')
                                <b class="text-info">{{ $candidacy->status }}</b>
                            @elseif ($candidacy->status == 'NÃO APROVADO')
                                <b class="text-danger">{{ $candidacy->status }}</b>
                            @else
                                <b>{{ $candidacy->status }}</b>
                            @endif

                        </h4>
                        <div class="row m-5 align-items-center">

                            <div class="col">
                                <div class="row align-items-center">
                                    <div class="col-12">
                                        <div class="row pt-4 pb-2">

                                            <div class="col-md-4 text-left">Dados Pessoais</div>
                                            <div class="col-md-8">
                                                <hr>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12 mb-2">
                                        <p class="mb-1">
                                            <b>Bilhete de Identidade: </b>{{ $candidacy->bi }}
                                        </p>
                                    </div>
                                    <div class="col-md-12 mb-2">
                                        <p class="mb-1">
                                            <b>Província: </b>{{ $candidacy->province->name }}
                                        </p>
                                    </div>
                                    <div class="col-md-12 mb-2">
                                        <p class="mb-1">
                                            <b>Município: </b>{{ $candidacy->county }}
                                        </p>
                                    </div>
                                    <div class="col-md-12 mb-2">
                                        <p class="mb-1">
                                            <b>Data de Nascimento: </b>
                                            {{ date('d/m/Y', strtotime($candidacy->birthdate)) }} -
                                            {{ date('Y') - date('Y', strtotime($candidacy->birthdate)) }} anos
                                        </p>
                                    </div>

                                    <div class="col-md-12 mb-2">
                                        <p class="mb-1">
                                            <b>Residência Actual: </b>{{ $candidacy->residence }}
                                        </p>
                                    </div>
                                    <div class="col-md-12 mb-2">
                                        <p class="mb-1">
                                            <b>Telefone: </b>{{ $candidacy->tel }}
                                        </p>
                                    </div>
                                    <div class="col-md-12 mb-2">
                                        <p class="mb-1">
                                            <b>Email: </b>{{ $candidacy->email }}
                                        </p>
                                    </div>
                                    <div class="col-md-12 mb-2">
                                        <p class="mb-1">
                                            <b>Nível Académico: </b>{{ $candidacy->qualification }}
                                        </p>
                                    </div>
                                    <div class="col-md-12 mb-2">
                                        <p class="mb-1">
                                            <b>IBAN <small>(International Bank Account Number)</small>:
                                            </b>{{ $candidacy->iban }}
                                        </p>
                                    </div>
                                    <div class="col-12">
                                        <div class="row pt-4 pb-2">

                                            <div class="col-md-4 text-left">Habilidades Profissionais e Humanas</div>
                                            <div class="col-md-8">
                                                <hr>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="col-12 col-md-12 col-lg-12 mb-2">
                                        <h5 class="mb-1">
                                            <b>HPH</b>
                                        </h5>
                                        <p class="text-dark text-justify">
                                        <ul>
                                            @if (!is_null($candidacy->hph))
                                                @php
                                                    $hphArray = json_decode($candidacy->hph);
                                                @endphp
                                                @if (is_array($hphArray) && count($hphArray) > 0)
                                                    @foreach ($hphArray as $hph)
                                                        <li>{{ $hph }}</li>
                                                    @endforeach
                                                @else
                                                    <i>--- NÃO SELECIONOU NENHUMA HABILIDADE ---</i>
                                                @endif
                                            @else
                                                <i>--- NÃO SELECIONOU NENHUMA HABILIDADE ---</i>
                                            @endif

                                        </ul>
                                        </p>
                                    </div>



                                    <div class="col-12">
                                        <div class="row pt-4 pb-2">

                                            <div class="col-md-4 text-left">Anexo dos Documentos Escaneados</div>
                                            <div class="col-md-8">
                                                <hr>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 mb-2">
                                        <div class="row">
                                            <div class="col-12 col-md-6 col-lg-6 text-center">
                                                <a target="_blank" href="/storage/{{ $candidacy->doc_qualification }}">
                                                    <img src="/images/icons/icon-doc.png" width="150" alt="">

                                                    <h5>Certificado de Habilitações Literárias ou outro documento que ateste
                                                        o Nível Académico</h5>
                                                </a>
                                            </div>
                                            <div class="col-12 col-md-6 col-lg-6 text-center">
                                                <a target="_blank" href="/storage/{{ $candidacy->doc_iban }}">
                                                    <img src="/images/icons/icon-doc.png" width="150" alt="">

                                                    <h5>Detalhes da Conta onde apresenta o IBAN (Solicite o documento no
                                                        banco ou tire pelo seu Internet Banking)</h5>
                                                </a>
                                            </div>

                                        </div>

                                    </div>

                                </div>

                                <div class="row align-items-center">
                                    <div class="col-md-7 mb-2">
                                        <hr>
                                        <p class="mb-1"><b>Data de Cadastro:</b> {{ $candidacy->created_at }}
                                        </p>
                                        <p class="mb-1"><b>Última Actualização:</b>
                                            {{ $candidacy->updated_at }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>



                    </div> <!-- /.col-md-8 -->
                    <div class="col-md-4 mt-5 ">
                        <div class="col-12 bg-primary p-5">
                            <h4 class="text-left text-white">Editar Estado da Candidatura</h4>
                            <form action="{{ route('admin.candidacy.approved.update', $candidacy->id) }}" method="POST">
                                <div class="modal-body">
                                    @method('PUT')
                                    @csrf
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="status" value="NÃO APROVADO"
                                            id="NAOAPROVADO"
                                            {{ $candidacy->status == 'NÃO APROVADO' ? 'checked' : '' }}>
                                        <label class="form-check-label text-white" for="NAOAPROVADO">
                                            NÃO APROVADO
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="status" value="APROVADO"
                                            id="APROVADO" {{ $candidacy->status == 'APROVADO' ? 'checked' : '' }}>
                                        <label class="form-check-label text-white" for="APROVADO">
                                            APROVADO
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="status" value="IMPRESSO"
                                            id="IMPRESSO" {{ $candidacy->status == 'IMPRESSO' ? 'checked' : '' }}>
                                        <label class="form-check-label text-white" for="IMPRESSO">
                                            IMPRESSO
                                        </label>
                                    </div>

                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="status"
                                            value="AGUARDA AVALIAÇÃO" id="AGUARDAAVALIACAO"
                                            {{ $candidacy->status == 'AGUARDA AVALIAÇÃO' ? 'checked' : '' }}>
                                        <label class="form-check-label text-white" for="AGUARDAAVALIACAO">
                                            AGUARDA AVALIAÇÃO
                                        </label>
                                    </div>

                                </div>
                                <div class="text-center mt-5">
                                    <button type="submit" class="btn bg-white text-primary py-2 px-5">Actualizar</button>
                                </div>

                            </form>
                        </div>
                        <div class="col-12 text-center p-5">
                            <h5>Fotografia de Identificação (A foto precisa estar no modelo abaixo)</h5>
                            <img src="/storage/{{ $candidacy->photo }}" width="100%" alt="">

                        </div>

                    </div>
                </div> <!-- .row -->
            </div> <!-- .container-fluid -->


        </div>
    </div>


@endsection
