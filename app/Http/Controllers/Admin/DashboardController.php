<?php

namespace App\Http\Controllers\Admin;

use App\Classes\Logger;
use App\Http\Controllers\Controller;
use App\Models\Candidacy;
use App\Models\Log;
use App\Models\News;
use App\Models\Province;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    private $Logger;

    public function __construct()
    {
        $this->Logger = new Logger();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /* Counts */
        $count_news = News::count();
        $count_user = User::count();
        $count_candidacy = Candidacy::count();
        $count_candidacy_P11 = Candidacy::where('province_id', 'P11')->count();



      // Obter todas as províncias
    $provinces = Province::orderBy('name', 'asc')->get();

    // Contar o número de candidaturas por província
    $candidaciesByProvince = Candidacy::select('province_id', DB::raw('COUNT(*) as total'))
        ->groupBy('province_id')
        ->get()
        ->pluck('total', 'province_id')
        ->toArray();

    // Preencher os dados com zero para as províncias sem candidaturas
    $data = [];
    foreach ($provinces as $province) {
        $data[] = $candidaciesByProvince[$province->ref] ?? 0;
    }

    $candidaciesByProvince = [
        'labels' => $provinces->pluck('name')->toArray(),
        'data' => $data,
    ];
    return view('admin.home.index', compact('candidaciesByProvince', 'count_news','count_user', 'count_candidacy_P11', 'count_candidacy'));

    }
}
