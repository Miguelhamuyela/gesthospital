<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Candidacy;
use Illuminate\Http\Request;

class CredencialController extends Controller
{
    /**
     * Display a verify with certified QrScan
     *
     * @return \Illuminate\Http\Response
     */
    public function verify($bi)
    {

        $response['candidacy'] = Candidacy::where('bi', $bi)->with('province')->first();

        return view('site.candidacy.verify.index', $response);
    }


}
