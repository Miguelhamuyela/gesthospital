@extends('layouts.merge.site')
@section('titulo', 'Minha Prova')
@section('content')

    <!-- ====== Banner Start ====== -->
    <section class="ud-page-banner">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ud-banner-content">
                        <h1> Minha Prova</h1>

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
                <form class="row" action="{{ route('site.quiz.show') }}">
                    @csrf



                    <div class="col-12 mb-3">
                        <label for="rcorners2" class="form-label">
                            <h3>Pesquisar</h3>
                        </label>
                    </div>

                    <div class="col-md-5 col-lg-3 col-12">

                        <select name="province_id" class="form-control" required>
                            <option disabled selected>Província que Selecionou</option>

                            @foreach ($provinces as $item)
                                <option value="{{ $item->ref }}"
                                    @isset($candidacy)
                                        {!! $candidacy->province_id == $item->ref ? 'selected' : '' !!}
                                    @endisset>
                                    {{ $item->name }}
                                </option>
                            @endforeach

                        </select>

                    </div>

                    <div class="col-12 col-md-7 col-lg-9 row">

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
                @if ($candidacy->status == 'APROVADO')
                    <div class="col-12 mt-5">

                        <div class="col-12 text-left">
                            <h4>Candidato: {{ $candidacy->fullname }}</h4>
                        </div>

                        <div id="countdownDisplay" class="mt-5">
                            <h1 class="text-center text-danger">
                                <span id="countdown">20:00</span>
                            </h1>
                        </div>
                        <form id="wizardForm" method="POST" action="{{ route('site.quiz.submit', $candidacy->id) }}">
                            @csrf
                            <div class="step active text-center card shadow py-5">
                                <h4 class="my-5">Confirmação de Início de Prova</h4>
                                <div class="mb-3">
                                    <p>Deseja iniciar a Prova?</p>
                                </div>
                                <button type="button" class="ud-main-btn ud-link-btn mybutton next" id="startButton">Iniciar <i
                                        class="lni lni-arrow-right"></i></button>

                            </div>


                            @foreach ($questions as $question)
                                <div class="step">
                                    <h4 class="mb-3">{{ $question->question }}</h4>
                                    @foreach ($question->answers as $answer)
                                        <div class="m-2 p-2">

                                            <input class="form-check-input" type="radio" id="answer{{ $answer->id }}"
                                                name="question_{{ $question->id }}" value="{{ $answer->id }}">
                                            <label class="form-check-label"
                                                for="answer{{ $answer->id }}">{{ $answer->answer }}</label>
                                        </div>
                                    @endforeach




                                    <button type="button" class="btn btn-secondary prev">Anterior</button>
                                    <button type="button" class="btn btn-primary next">Próximo</button>

                                </div>
                            @endforeach

                            <div class="step">
                                <h3>Confirmação de Submissão</h3>
                                <div class="my-5">
                                    <input class="form-check-input" type="radio" id="answerconfirm" name="answerconfirm"
                                        value="OK" required>
                                    <label class="form-check-label" for="answerconfirm">
                                        Confirme que respondeu com exatidão as questões
                                        apresentadas?
                                    </label>

                                </div>
                                <button type="button" class="btn btn-secondary prev">Anterior</button>
                                <button type="submit" class="btn btn-success">Enviar</button>
                            </div>
                        </form>
                    </div>
                @endif
            @endisset

            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
            <script>
                $(document).ready(function() {
                    var currentStep = 0;
                    var steps = $(".step");

                    function showStep(step) {
                        steps.removeClass("active");
                        steps.eq(step).addClass("active");
                    }

                    $(".next").click(function() {
                        if (currentStep < steps.length - 1) {
                            currentStep++;
                            showStep(currentStep);
                        }
                    });

                    $(".prev").click(function() {
                        if (currentStep > 0) {
                            currentStep--;
                            showStep(currentStep);
                        }
                    });

                    showStep(currentStep);
                });
            </script>
        </div>

        </div>

    </section>



@endsection
@section('CSSJS')

    <script src="/js/counter.js"></script>
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

        .step {
            display: none;
        }

        .step.active {
            display: block;
        }
    </style>
@endsection
