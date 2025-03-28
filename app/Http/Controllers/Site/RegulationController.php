<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Regulation;
use Illuminate\Http\Request;

class RegulationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $response['regulamenets'] = Regulation::get();
        return view('site.censo.regulation.index', $response);
    }
}
