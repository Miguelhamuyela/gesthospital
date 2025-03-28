<?php

namespace App\Http\Controllers\Admin;

use App\Classes\Logger;
use App\Http\Controllers\Controller;
use App\Models\Ftpfile;
use Illuminate\Http\Request;

class FtpfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $Logger;

    public function __construct()
    {
        $this->Logger = new Logger();
    }
    public function list()
    {
        $response['ftpfiles'] = Ftpfile::orderBy('id', 'desc')->get();
        //Logger
        $this->Logger->log('info', 'Listou os Arquivos de indexação');
        return view('admin.ftpfile.list.index', $response);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Logger
        $this->Logger->log('info', 'Entrou em Criar arquivo de indexação');
        return view('admin.ftpfile.create.index');
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
            'name' => 'required|string|max:255|unique:ftpfiles',
            'file' => 'required|mimes:jpg,png,jpeg,pdf,pptx,ppt',
        ]);

        $middle = $request->file('file');
        $file = $middle->storeAs('arquivos', $request->name. '.' . $middle->extension());

        $ftpfile = Ftpfile::create([
            'link' => "/storage/".$file,
            'name' => $request->name,
        ]);
        //Logger
        $this->Logger->log(
            'info',
            'Cadastrou um arquivo de indexação com o nome ' . $ftpfile->name
        );
        return redirect()->route('admin.ftpfile.show', $ftpfile->id)->with('create', '1');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $response['ftpfile'] = Ftpfile::find($id);
        //Logger
        $this->Logger->log(
            'info',
            'Visualizou um arquivo de indexação com o ID ' . $id
        );
        return view('admin.ftpfile.details.index', $response);
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
        $response['ftpfile'] = Ftpfile::find($id);
        //Logger
        $this->Logger->log(
            'info',
            'Entrou em editar um arquivo de indexação com o ID' . $id
        );
        return view('admin.ftpfile.edit.index', $response);
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
            'name' => 'required|string|max:255|unique:ftpfiles',
            'file' => 'mimes:jpg,png,jpeg,pdf,pptx,ppt',
        ]);

        if ($middle = $request->file('file')) {
            $file =  "/storage/".$middle->storeAs(
                'arquivos',
                'CENSO-ARQUIVO-' . $request->name . '.' . $middle->extension()
            );
        } else {
            $file = Ftpfile::find($id)->cover;
        }

        Ftpfile::find($id)->update([
            'link' => $file,
            'name' => $request->name,
        ]);
        //Logger
        $this->Logger->log(
            'info',
            'Editou um arquivo de indexação com o ID' . $id
        );
        return redirect()->route('admin.ftpfile.show', $id)->with('edit', '1');
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
        $this->Logger->log(
            'info',
            'Eliminou um arquivo de indexação com o ID' . $id
        );
        Ftpfile::find($id)->delete();
        return redirect()
            ->back()
            ->with('destroy', '1');
    }
}
