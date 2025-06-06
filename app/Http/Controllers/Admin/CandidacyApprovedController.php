<?php

namespace App\Http\Controllers\Admin;

use App\Classes\Logger;
use App\Http\Controllers\Controller;
use App\Models\Candidacy;
use App\Models\Province;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CandidacyApprovedController extends Controller
{
    private $Logger;

    public function __construct()
    {
        $this->Logger = new Logger();
    }

    public function index()
    {

        if (Auth::user()->level == 'Recrutador' && Auth::user()->province_ref != 'NACIONAL') {

            $response['candidacies'] = Candidacy::with('province')->where([['status', '=', 'APROVADO'], ['province_id', Auth::user()->province_ref]])->orWhere('status', '=', 'IMPRESSO')->limit(500)->get();


        }elseif (Auth::user()->level == 'Administrador') {

            $response['candidacies'] = Candidacy::with('province')->where('status', '=', 'APROVADO')->orWhere('status', '=', 'IMPRESSO')->limit(500)->get();

        }




        //Logger
        $this->Logger->log('info', 'Listou as Candidaturas');
        return view('admin.candidacy.approved.list.index', $response);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {


        $response['candidacy'] = Candidacy::with('province')->find($id);

        //Logger
        $this->Logger->log('info', 'Visualizar uma candidatura com o ID ' . $id);
        return view('admin.candidacy.approved.details.index', $response);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|string|max:255',
        ]);

        Candidacy::where('id', $id)->update([
            'status' => $request->status,
        ]);
        //Logger
        $this->Logger->log('info', 'Editou o estado de uma candidatura com o ID ' . $id);

        return redirect()->route('admin.candidacy.approved.index')->with('edit', '1');
    }
}
