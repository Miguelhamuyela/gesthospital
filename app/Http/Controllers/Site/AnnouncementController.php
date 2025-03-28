<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Annonce;
use Illuminate\Http\Request;

class AnnouncementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $response['annonces'] = Annonce::where([['state', 'Autorizada']])->orderBy('id', 'desc')->paginate(6);
        return view('site.announce.all.index', $response);
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $title
     * @return \Illuminate\Http\Response
     */
    public function show($title)
    {

        try {

            $response['annonce'] = Annonce::where([['state', 'Autorizada'], ['title', urldecode($title)]])->first();
            $response['lasted'] = Annonce::where([['state', 'Autorizada'], ['title', '!=', urldecode($title)]])->orderBy('id', 'desc')->limit(3)->get();

            return view('site.announce.single.index', $response);
        } catch (\Throwable $th) {
            return redirect()->route('site.announcent');
        }
    }
}
