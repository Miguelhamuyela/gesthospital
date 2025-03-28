<?php

namespace App\Http\Controllers\Admin;

use App\Classes\Logger;
use App\Http\Controllers\Controller;
use App\Models\Annonce;
use Illuminate\Http\Request;

class AnnonceController extends Controller
{

    private $Logger;

    public function __construct()
    {
        $this->Logger = new Logger;
    }

    public function list()
    {

        $response['Annonce'] = Annonce::get();

        //Logger
        $this->Logger->log('info', 'Listou Anúncios');

        return view('admin.annonce.list.index', $response);
    }


    public function create()
    {

        //Logger
        $this->Logger->log('info', 'Entrou em Criar Anúncio');

        return view('admin.annonce.create.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validation = $request->validate([
            'title' => 'required|min:5|max:255',
            'subtitle' => 'required|min:5|max:255',
            'typewriter' => 'required|min:2|max:255',
            'body' => 'required||min:10',
            'date' => 'required|date',
            'image' =>  'required|mimes:jpg,png,jpeg',   ]);
        $file = $request->file('image')->store('annonces');

        $Annonce = Annonce::create([
            'path' => $file,
            'title' => $request->title,
            'subtitle' => $request->subtitle,
            'typewriter' => $request->typewriter,
            'body' => $request->body,
            'date' => $request->date,
            'state' => 'Autorizada'
        ]);

        //Logger
        $this->Logger->log('info', 'Cadastrou um Anúncio com o titulo ' . $Annonce->title);

        return redirect("admin/annonce/show/$Annonce->id")->with('create', '1');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $response['Annonce'] = Annonce::find($id);

        //Logger
        $this->Logger->log('info', 'Visualizou um Anúncio com o identificador ' . $id);

        return view('admin.annonce.details.index', $response);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $response['Annonce'] = Annonce::find($id);

        //Logger
        $this->Logger->log('info', 'Entrou em editar um Anúncio com o identificador ' . $id);

        return view('admin.annonce.edit.index', $response);
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
        $validation = $request->validate([
            'title' => 'required|min:5|max:255',
            'subtitle' => 'required|min:5|max:255',
            'typewriter' => 'required|min:2|max:255',
            'body' => 'required|min:5',
            'date' => 'required|date',
            'image' =>  'mimes:jpg,png,jpeg',
        ]);

        if ($file = $request->file('image')) {
            $file = $file->store('annonces');
        } else {
            $file = Annonce::find($id)->path;
        }
        $Annonce = Annonce::find($id)->update([
            'path' => $file,
            'title' => $request->title,
            'subtitle' => $request->subtitle,
            'typewriter' => $request->typewriter,
            'body' => $request->body,
            'state' => $request->state,
            'date' => $request->date,
            'state' => 'Autorizada'
        ]);

        //Logger
        $this->Logger->log('info', 'Editou um Anúncio com o identificador ' . $id);

        return redirect("admin/annonce/show/$id")->with('edit', '1');
    }


    public function destroy($id)
    {
        //Logger
        $this->Logger->log('info', 'Eliminou um Anúncio com o identificador ' . $id);

        Annonce::find($id)->delete();
        return redirect()->back()->with('destroy', '1');
    }
}
