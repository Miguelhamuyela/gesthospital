<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\AnswerCandidacy;
use App\Models\Candidacy;
use App\Models\Province;
use App\Models\Question;
use Illuminate\Http\Request;

class QuizController extends Controller
{



    public function start()
    {
        $response['provinces'] = Province::get();

        return view('site.quiz.start.index',$response);
    }

    public function show(Request $request){


        $request->validate([
            'search' => 'required|string|min:14|max:20',

        ]);


        $candidacymiddle = Candidacy::where([['bi', $request->search], ['province_id', $request->province_id]])->first();
        if($candidacymiddle->status_exam == 'OK'){
            return redirect()->route('site.home')->with('infocomplete', 1);
        }else{
            $response['provinces'] = Province::get();
            $response['search'] = $request->search;
            $response['candidacy'] = Candidacy::where([['bi', $request->search], ['province_id', $request->province_id], ['status', 'APROVADO']])->with('province')->first();
            $response['information'] = Candidacy::where([['bi', $request->search], ['province_id', $request->province_id], ['status', 'APROVADO']])->first();

            $response['questions'] = Question::with('answers')->inRandomOrder()->limit(4)->get();

            return view('site.quiz.start.index', $response);
        }

    }


    public function submit(Request $request, $id)
    {

        // Valide os dados recebidos
        $validated = $request->validate([
            'answerconfirm' => 'required',
            'question_*' => 'required', // validação para as respostas das questões
        ]);

        $candidateId = $id; // ou $request->input('candidacy_id');


        $candidacymiddle = Candidacy::find($id);
        if($candidacymiddle->status_exam == 'OK'){
            return redirect()->route('site.home')->with('infocomplete', 1);
        }else{

            // Salvar respostas
            foreach ($request->all() as $key => $value) {
                if (str_starts_with($key, 'question_')) {
                    $questionId = str_replace('question_', '', $key);
                    // Supondo que você tenha um modelo Answer e um modelo Candidate que têm um relacionamento de muitos-para-muitos
                    AnswerCandidacy::create([
                        'candidacy_id' => $candidateId,
                        'question_id' => $questionId,
                        'answer_id' => $value,
                    ]);
                }
            }

            Candidacy::find($id)->update([
                'status_exam' => $request->answerconfirm,
            ]);

            // Redirecionar ou retornar uma resposta apropriada
            return redirect()->route('site.home')->with('successexam', 1); // ou uma outra rota apropriada
        }
    }
}
