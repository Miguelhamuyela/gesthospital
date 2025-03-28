<?php

namespace App\Http\Controllers\Site;

use App\Classes\Random;
use App\Http\Controllers\Controller;
use App\Http\Requests\CandidacyRequest;
use App\Models\Candidacy;
use App\Models\Province;
use Intervention\Image\ImageManagerStatic as Image;

class CandidacyController extends Controller
{
    private $random;
    public function __construct()
    {
        $this->random = new Random;
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $response['provinces'] = Province::get();
        return view('site.candidacy.create.index', $response);
    }

    public function store(CandidacyRequest $request)
    {
        $doc_qualification = $request->file('doc_qualification')->store('candidacies/qualifications');
        $doc_iban = $request->file('doc_iban')->store('candidacies/ibans');
        $photo = $request->file('photo')->store('candidacies/photo');


        //RESIZE PHOTO

        // Caminho para a pasta que você deseja criar
        $caminhoPasta = '../storage/app/public/candidacies/';

        // Verifica se a pasta não existe
        if (!file_exists($caminhoPasta)) {
            // Cria a pasta com permissões 0777 (todas as permissões para todos os usuários)
            mkdir($caminhoPasta, 0777, true);
        }

        // Continua com o restante do seu código
        $nameFile = $this->random->AlphaNumeric(6) . ".jpg";
        $img = Image::make($request->file('photo'))->resize(428, 395);
        $img->save($caminhoPasta . $nameFile);



        $middle = Candidacy::create([
        'province_id' => $request->province_id,
        'county' => $request->county,
        'bi' => $request->bi,
        'fullname' => $request->fullname,
        'birthdate' => $request->birthdate,
        'residence' => $request->residence,
        'tel' => $request->tel,
        'qualification' => $request->qualification,
        'email' => $request->email,
        'iban' => $request->iban,
        'hph' => json_encode($request->hph),

        //documents & image
        'doc_qualification' => $doc_qualification,
        'doc_iban' => $doc_iban,
        'photo' => 'candidacies/' . $nameFile,
        ]);

        /*
        $candidacy = Candidacy::with('province')->find($middle->id);
        CandidacyJob::dispatch($candidacy)->delay(now()->addSeconds('4'));
        */
        return redirect()->back()->with('candidacyCreate', '1');


    }



}
