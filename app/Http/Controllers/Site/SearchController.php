<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Annonce;
use App\Models\Defini;
use App\Models\News;
use App\Models\SlideShow;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('site.search.index');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function find(Request $request)
    {
        $request->validate([
            'search' => 'required|string|min:3|max:255',
        ]);

        $response['search'] = $request->search;
        $response['news'] = News::query()->where([['state', 'Autorizada'],['title', 'LIKE', "%{$request->search}%"]])->orWhere('body', 'LIKE', "%{$request->search}%")->get();
        $response['slideshows'] = SlideShow::query()->where([['title', 'LIKE', "%{$request->search}%"]])->get();
        $response['annonces'] = Annonce::query()->where([['title', 'LIKE', "%{$request->search}%"]])->orWhere('body', 'LIKE', "%{$request->search}%")->get();
        $response['definitions'] = Defini::query()->where([['title', 'LIKE', "%{$request->search}%"]])->orWhere('definicon', 'LIKE', "%{$request->search}%")->first();

        return view('site.search.index', $response);
    }
}
