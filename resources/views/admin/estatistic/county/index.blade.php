@extends('layouts.merge.dashboard')
@section('titulo', 'Estatística - Candidaturas por Munícipios')

@section('content')
    <div class="card mb-2">
        <div class="card-body">
            <h2 class="h5 page-title">
                Estatística - Candidaturas por Munícipios
            </h2>
        </div>
    </div>
    <div class="card shadow mb-4">
        <div class="card-body">

            <form action="{{ route('admin.estatistic.byCounty.show') }}" class="row align-items-center my-3">
                @csrf
                <div class="col-12 col-md-6 col-lg-8">
                    <div class="form-group">
                        <label for="province_ref">Províncias</label>
                        <select type="province_ref" name="province_ref" id="province_ref" class="form-control" required>

                            <option value="">Selecione a província</option>

                            @foreach ($provinces as $row)
                                <option value="{{ $row->ref }}">{{ $row->name }}</option>
                            @endforeach

                        </select>
                    </div>

                </div> <!-- /.col -->
                <div class="col-12 col-md-6 col-lg-4">
                    <button type="submit" class="btn btn-primary">Pesquisar</button>

                </div>
            </form>

            {!! isset($province->name)
                ? '<h4 class="text-center">Candidatura da Província: ' . $province->name . '</h4>'
                : '' !!}

            <div class="row">

                @foreach ($candidacies as $county => $total)
                    <div class="col-12 col-md-6 col-xl-4 mb-4">
                        <div class="card shadow">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col-3 text-center">
                                        <h4><b> {{ $total }}</b></h4>
                                    </div>
                                    <div class="col pr-0">
                                        <p class="text-dark mb-0">{{ $county }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>

        </div>
    </div>




@endsection
