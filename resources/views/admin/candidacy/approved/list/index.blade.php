@extends('layouts.merge.dashboard')
@section('titulo', 'Lista de Candidaturas Emitidas e Aprovadas')

@section('content')
    <div class="card mb-2">
        <div class="card-body">

            <div class="row">
                <div class="col-md-8">
                    <h2 class="h5 page-title">
                        Lista de Candidaturas Emitidas e Aprovadas
                    </h2>
                </div>

            </div>
        </div>
    </div>

    <div class="card shadow mb-4">
        <div class="card-body">

            <div class="col-12">
                <table class="table datatables table-hover table-bordered" id="dataTable-1">
                    <thead class="bg-primary">
                        <tr class="text-center">
                            <th>ID</th>
                            <th>NOME COMPLETO</th>
                            <th>LOCALIDADE</th>
                            <th>ESTADO</th>
                            <th>ACÇÕES</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white">

                        @foreach ($candidacies as $item)
                            <tr class="text-center ">
                                <td>{{ $item->id }}</td>
                                <td class="text-left">{{ $item->fullname }}</td>
                             
                                <td>{{ $item->province->name . ' (' . $item->county . ')' }} </td>

                                <td>
                                    @if ($item->status == 'APROVADO')
                                        <b class="text-success">{{ $item->status }}</b>
                                    @elseif ($item->status == 'IMPRESSO')
                                        <b class="text-info">{{ $item->status }}</b>
                                    @elseif ($item->status == 'NÃO APROVADO')
                                        <b class="text-danger">{{ $item->status }}</b>
                                    @else
                                        <b>{{ $item->status }}</b>
                                    @endif
                                </td>
                                <td>

                                    <a href="{{ route('admin.candidacy.approved.show', $item->id) }}" class="btn btn-primary">
                                        <i class="fe fe-eye fe-sm" aria-hidden="true"></i>
                                    </a>

                                    @if ($item->status == 'APROVADO' || $item->status == 'IMPRESSO')
                                        <a class="btn btn-warning" target="_blank"
                                            href="{{ route('admin.credencial.print', $item->id) }}">
                                            <i class="fe fe-file fe-sm" aria-hidden="true"></i>
                                        </a>
                                    @endif

                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>

        </div>
    </div>



@endsection
