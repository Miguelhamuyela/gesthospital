<?php

namespace App\Http\Controllers\Admin;

use App\Classes\Logger;
use App\Http\Controllers\Controller;
use App\Models\Defini;
use Illuminate\Http\Request;

class DefinitionController extends Controller
{
    /**
     * Display the specified resource.
     *

     * @return \Illuminate\Http\Response
     */
    private $Logger;

    public function __construct()
    {
        $this->Logger = new Logger;
    }
    public function show()
    {
        //
        $response['definitions'] = Defini::first();
        //Logger
        $this->Logger->log('info', 'Visualizou as definições');
        return view('admin.censo.definition.details.index', $response);
    }

    public function edit($id)
    {
        $response['definitions'] = Defini::find($id);
        //Logger
        $this->Logger->log('info', 'Entrou em editar as definições');
        return view('admin.censo.definition.edit.index', $response);
    }

    public function update(Request $request, $id)
    {
        $validation = $request->validate([
            'title' => 'required|min:10|max:255',
            'definicon' => 'required|min:20|',

        ]);
        $definition = Defini::find($id)->update([
            'title' => $request->title,
            'definicon' => $request->definicon,

        ]);
        //Logger
        $this->Logger->log('info', 'Editou as definições');
        return redirect()->back()->with('edit', '1');
    }
}
