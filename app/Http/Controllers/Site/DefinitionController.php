<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Defini;
use Illuminate\Http\Request;

class DefinitionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $response['defintions'] = Defini::get();
        return view('site.censo.definition.index', $response);
    }
}
