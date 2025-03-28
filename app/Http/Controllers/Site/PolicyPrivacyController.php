<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;

class PolicyPrivacyController extends Controller
{


    /**
     * Display a resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      return view('site.policyPrivacy.index');
    }
}
