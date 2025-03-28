<?php

namespace App\Http\Controllers\Admin;

use App\Classes\Logger;
use App\Http\Controllers\Controller;
use App\Models\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    private $Logger;

    public function __construct()
    {
        $this->Logger = new Logger;
    }

    public function index ()
    {

        $response['questions'] = Question::with('answers')->get();
        //Logger
        $this->Logger->log('info', 'Listou as Questões');
        return view('admin.question.list.index', $response);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Logger
        $this->Logger->log('info', 'Entrou em criar questão');
        return view('admin.question.create.index');
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
            'question' => 'required|string',
            'answers' => 'required|array|min:5',
            'answers.*' => 'required|string',
            'correct_answer' => 'required|integer|min:0|max:4',

        ]);
        $question = Question::create(['question' => $request->question]);

        foreach ($request->answers as $index => $answer) {
            $question->answers()->create([
                'answer' => $answer,
                'is_correct' => $index == $request->correct_answer,
            ]);
        }

        return redirect()->route('admin.question.index')->with('create', 'Question created successfully!');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $response['question'] = Question::find($id);

        //Logger
        $this->Logger->log('info', 'Visualizou uma questão com o identificador ' . $id);
        return view('admin.question.details.index', $response);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $response['question'] = Question::find($id);
        //Logger
        $this->Logger->log('info', 'Entrou em editar uma questão com o identificador ' . $id);
        return view('admin.question.edit.index', $response);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Question $question)
    {
        $validation = $request->validate([
            'question' => 'required|string',
            'answers' => 'required|array|min:5',
            'answers.*' => 'required|string',
            'correct_answer' => 'required|integer|min:0|max:4',
        ]);

        $question->update(['question' => $request->question]);

        // Delete existing answers and add new ones
        $question->answers()->delete();
        foreach ($request->answers as $index => $answer) {
            $question->answers()->create([
                'answer' => $answer,
                'is_correct' => $index == $request->correct_answer,
            ]);
        }

        return redirect()->route('admin.question.index')->with('edit', 'Question updated successfully!');

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
        $this->Logger->log('info', 'Eliminou uma questão com o identificador ' . $id);
        Question::find($id)->delete();
        return redirect()->back()->with('destroy', '1');
    }
}
