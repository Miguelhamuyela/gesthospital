<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use ZipArchive;

class TabletController extends Controller
{

    public function downloadDocuments()
    {
        $filePath = public_path('tablet/censo.zip');

        // Verifica se o arquivo existe
        if (!file_exists($filePath)) {
            abort(404, 'Arquivo não encontrado.');
        }

        // Retorna o arquivo para download
        return response()->download($filePath);
    }
}
