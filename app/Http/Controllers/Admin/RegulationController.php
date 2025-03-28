<?php

namespace App\Http\Controllers\Admin;

use App\Classes\Logger;
use App\Http\Controllers\Controller;
use App\Models\Regulation;
use Illuminate\Http\Request;

class RegulationController extends Controller
{


    private $Logger;

    public function __construct()
    {
        $this->Logger = new Logger;
    }

    public function index()
    {
        $response['regulaments'] = Regulation::get();
           //Logger
           $this->Logger->log('info', 'Listou os Regulamentos');
        return view('admin.censo.regulations.list.index', $response);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        //Logger
        $this->Logger->log('info', 'Entrou em Criar Regulamentos');
        return view('admin.censo.regulations.create.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'file' =>  'required|mimes:jpg,png,pdf,docx,pptx',
            'title' => 'required|min:5|max:255',
        ]);

        $middle = $request->file('file');
        $file = $middle->storeAs('regulations', 'CENSO-Regulamentação-' . uniqid(rand(1, 5)).".".$middle->extension());

        $regulament = Regulation::create([
            'file' => $file,
            'title' => $request->title,

        ]);
        //Logger
        $this->Logger->log('info', 'Cadastrou um Regulamento com o titulo ' . $regulament->title);
        return redirect("admin/regulation/show/$regulament->id")->with('create', '1');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $response['regulament'] = Regulation::find($id);
         //Logger
         $this->Logger->log('info', 'Visualizou um Regulamento com o identificador ' . $id);

        return view('admin.censo.regulations.detalis.index', $response);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $response['regulament'] = Regulation::find($id);
             //Logger
             $this->Logger->log('info', 'Entrou em editar um Regulamento com o identificador ' . $id);

        return view('admin.censo.regulations.edit.index', $response);
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
            'file' =>  'mimes:jpg,png,pdf,docx,pptx',
            'title' => 'required|min:5|max:255'
        ]);

        if ($middle = $request->file('file')) {
            $file = $middle->storeAs('regulations', 'CENSO-Regulamentação-' . uniqid(rand(1, 5)).".".$middle->extension());
        } else {
            $file = Regulation::find($id)->file;
        }

        Regulation::find($id)->update([
            'file' => $file,
            'title' => $request->title
        ]);
                //Logger
                $this->Logger->log('info', 'Editou um Regulamento com o identificador ' . $id);
        return redirect("admin/regulation/show/$id")->with('edit', '1');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
              //Logger
              $this->Logger->log('info', 'Eliminou um Regulamento com o identificador ' . $id);
        Regulation::find($id)->delete();
        return redirect()->back()->with('destroy', '1');
    }
}
