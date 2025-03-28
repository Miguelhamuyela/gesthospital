<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Province;
use App\Models\Candidacy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EstatisticController extends Controller
{

    public function status()
    {

        $response['RECEBIDO'] = json_encode(Candidacy::where('status', 'AGUARDA AVALIAÇÃO')->count());
        $response['APROVADO'] = json_encode(Candidacy::where('status', 'APROVADO')->count());
        $response['NAOAPROVADO'] = json_encode(Candidacy::where('status', 'NÃO APROVADO')->count());
        $response['IMPRESSO'] = json_encode(Candidacy::where('status', 'IMPRESSO')->count());

        $response['total'] = json_encode(Candidacy::count());

        return view('admin.estatistic.status.index', $response);
    }

    public function academiclevel(){

        $response["EMC"] = json_encode(Candidacy::where('qualification', 'Ensino Médio Concluído')->count());
        $response["FU"] = json_encode(Candidacy::where('qualification', 'Frequência Universitária')->count());
        $response["FUC"] = json_encode(Candidacy::where('qualification', 'Formação Universitária Concluída')->count());

        return view('admin.estatistic.academiclevel.index',$response);

    }
    public function province()
    {

        $candidacies = Candidacy::select('province_id', 'provinces.name', DB::raw('count(*) as total'))
        ->join('provinces', 'candidacies.province_id', '=', 'provinces.ref')
        ->groupBy('province_id', 'provinces.name')
        ->orderBy('province_id')
        ->pluck('total', 'provinces.name');

        return view('admin.estatistic.province.index', compact('candidacies'));
    }
    public function provinceapto()
    {

        $candidacies = Candidacy::where('status', 'APROVADO')->select('province_id', 'provinces.name', DB::raw('count(*) as total'))
        ->join('provinces', 'candidacies.province_id', '=', 'provinces.ref')
        ->groupBy('province_id', 'provinces.name')
        ->orderBy('province_id')
        ->pluck('total', 'provinces.name');

        return view('admin.estatistic.province.index', compact('candidacies'));
    }



    public function byCounty()
    {

        $provinces = Province::orderBy('name', 'asc')->get();
        $candidacies = Candidacy::select('county', DB::raw('count(*) as total'))
        ->groupBy('county')
        ->orderBy('county')
        ->pluck('total', 'county');


        return view('admin.estatistic.county.index', compact('candidacies', 'provinces'));
    }


    public function byCountyShow(Request $request)
    {
        $response['provinces'] = Province::orderBy('name', 'asc')->get();
        $response['candidacies'] = Candidacy::select('county', DB::raw('count(*) as total'))
        ->groupBy('county')
        ->where('province_id', $request->province_ref)
        ->orderBy('county')
        ->pluck('total', 'county');


        $response['province'] =  Province::where('ref', $request->province_ref)->get();
        return view('admin.estatistic.county.index', $response);
    }




}
