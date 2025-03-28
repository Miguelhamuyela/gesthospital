<?php

namespace App\Http\Controllers\Admin;

use App\Classes\Logger;
use App\Http\Controllers\Controller;
use App\Models\Candidacy;
use Barryvdh\DomPDF\Facade\Pdf;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class CredencialController extends Controller
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
    /**
     * Display a verify with certified QrScan
     *
     * @return \Illuminate\Http\Response
     */
    public function verify($id)
    {
        $response['candidacy'] = Candidacy::find($id);
        return view('site.candidacy.verify.index', $response);
    }


    /**
     * Print the Certified
     *
     * @return \Illuminate\Http\Response
     */
    public function print($id)
    {

        $response['candidacy'] = Candidacy::find($id);

        if ($response['candidacy']->status == 'IMPRESSO' || $response['candidacy']->status == 'APROVADO') {


            $response['qrcode'] = QrCode::size(90)->generate(route('site.credencial.verify', $id));
            $pdf = PDF::loadView('pdf/candidacy/credencial', $response);
            $pdf->setPaper('A6', 'portrait');

            //Logger
            $this->Logger->log('emergency', 'Imprimiu uma credencial com o código: ' . $response['candidacy']->id);

            //UPDATED STATUS
            Candidacy::find($response['candidacy']->id)->update([
                'status' => 'IMPRESSO'
            ]);

            return $pdf->stream('CAC -' . $response['candidacy']->bi . ".pdf");
        } else {

            return redirect()->route('login')->with('NoAuth', '1');
        }
    }
}
