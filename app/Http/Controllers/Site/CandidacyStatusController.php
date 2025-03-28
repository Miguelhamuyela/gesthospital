<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Candidacy;
use App\Models\Province;
use Barryvdh\DomPDF\Facade\Pdf;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use App\Classes\Random;
use App\Http\Requests\CandidacyEditRequest;
use Intervention\Image\ImageManagerStatic as Image;

class CandidacyStatusController extends Controller
{

    private $random;
    public function __construct()
    {
        $this->random = new Random;
    }

    public function index()
    {
        $response['provinces'] = Province::get();
        return view('site.candidacy.status.index',$response);
    }


    public function show(Request $request){


        $request->validate([
            'search' => 'required|string|min:10|max:20',

        ]);



        $response['provinces'] = Province::get();
        $response['search'] = $request->search;
        $response['candidacy'] = Candidacy::where('bi', $request->search)->with('province')->first();
        $response['information'] = Candidacy::where('bi', $request->search)->first();


     
        return view('site.candidacy.status.index', $response);
    }


    public function print($bi)
    {

        $response['qrcode'] = QrCode::size(70)->generate(route('site.credencial.verify', $bi));
        $response['candidacy'] = Candidacy::where('bi', $bi)->first();
        $pdf = PDF::loadView('pdf/candidacy/proof', $response);


        return $pdf->stream('comprovativo de candidatura '.$bi.'.pdf');
    }


    public function update(CandidacyEditRequest $request, $id)
    {


        $application = Candidacy::find($id);

        // Verifique se a candidatura está dentro do período de 48 horas desde a data da candidatura
        if ($application->created_at->addHours(48)->isPast()) {
            abort(403, 'Você não pode editar esta candidatura após 48 horas de sua submissão.');
        }


        //FILE QUALIFICATIONS
        if ($doc_qualification = $request->file('doc_qualification')) {
            $doc_qualification = $request->file('doc_qualification')->store('candidacies/qualifications');
        } else {
            $doc_qualification = Candidacy::find($id)->doc_qualification;
        }


        //FILE IBAN
        if ($doc_iban = $request->file('doc_iban')) {
            $doc_iban = $request->file('doc_iban')->store('candidacies/ibans');
        } else {
            $doc_iban = Candidacy::find($id)->doc_iban;
        }


        //Candidacy PHOTO
        if ($filePhoto = $request->file('photo')) {

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

        } else {
            $filePhoto = Candidacy::find($id)->photo;
        }


        Candidacy::find($id)->update([
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
        'photo' => isset($nameFile) ?  'candidacies/' . $nameFile : $filePhoto

        ]);

        return redirect()->back()->with('candidacyEdit', '1');

    }



}
