<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/




/* Grupo de rotas autenticadas */

Route::middleware(['auth'])->group(function () {
    /* Manager Dashboard  */
    route::get('admin/painel', ['as' => 'admin.home', 'uses' => 'Admin\DashboardController@index']);

    Route::middleware(['Administrador'])->group(function () {

        /* User */
        Route::get('admin/user/index', ['as' => 'admin.user.index', 'uses' => 'Admin\UserController@index']);
        Route::get('admin/user/show/{id}', ['as' => 'admin.user.show', 'uses' => 'Admin\UserController@show'])->withoutMiddleware(['Administrador']);
        Route::get('admin/user/edit/{id}', ['as' => 'admin.user.edit', 'uses' => 'Admin\UserController@edit'])->withoutMiddleware(['Administrador']);
        Route::put('admin/user/update/{id}', ['as' => 'admin.user.update', 'uses' => 'Admin\UserController@update'])->withoutMiddleware(['Administrador']);
        Route::get('admin/user/delete/{id}', ['as' => 'admin.user.delete', 'uses' => 'Admin\UserController@destroy'])->withoutMiddleware(['Administrador']);
        /* end user */

        /* Candidaturas */
        Route::get('candidaturas', ['as' => 'site.candidacy', 'uses' => 'Site\CandidacyController@create']);
        Route::post('candidaturas/store', ['as' => 'site.candidacy.store', 'uses' => 'Site\CandidacyController@store']);

    });
    Route::middleware(['Editor'])->group(function () {


        /* regulamentos */
        Route::get('admin/regulation/index', ['as' => 'admin.regulation.index', 'uses' => 'Admin\RegulationController@index']);
        Route::get('admin/regulation/show/{id}', ['as' => 'admin.regulation.show', 'uses' => 'Admin\RegulationController@show']);
        Route::get('admin/regulation/create', ['as' => 'admin.regulation.create', 'uses' => 'Admin\RegulationController@create']);
        Route::post('admin/regulation/store', ['as' => 'admin.regulation.store', 'uses' => 'Admin\RegulationController@store']);
        Route::get('admin/regulation/edit/{id}', ['as' => 'admin.regulation.edit', 'uses' => 'Admin\RegulationController@edit']);
        Route::put('admin/regulation/update/{id}', ['as' => 'admin.regulation.update', 'uses' => 'Admin\RegulationController@update']);
        Route::get('admin/regulation/delete/{id}', ['as' => 'admin.regulation.delete', 'uses' => 'Admin\RegulationController@destroy']);
        /* end regulamentos */


        /**definicao */
        Route::get('admin/censo/definition/show', ['as' => 'admin.definition.show', 'uses' => 'Admin\DefinitionController@show']);
        Route::get('admin/censo/definition/edit/{id}', ['as' => 'admin.definition.edit', 'uses' => 'Admin\DefinitionController@edit']);
        Route::put('admin/censo/definition/update/{id}', ['as' => 'admin.definition.update', 'uses' => 'Admin\DefinitionController@update']);



        /* slideshow */
        Route::get('admin/slideshow/index', ['as' => 'admin.slideshow.index', 'uses' => 'Admin\SlideShowController@list']);
        Route::get('admin/slideshow/show/{id}', ['as' => 'admin.slideshow.show', 'uses' => 'Admin\SlideShowController@show']);
        Route::get('admin/slideshow/create', ['as' => 'admin.slideshow.create', 'uses' => 'Admin\SlideShowController@create']);
        Route::post('admin/slideshow/store', ['as' => 'admin.slideshow.store', 'uses' => 'Admin\SlideShowController@store']);
        Route::get('admin/slideshow/edit/{id}', ['as' => 'admin.slideshow.edit', 'uses' => 'Admin\SlideShowController@edit']);
        Route::put('admin/slideshow/update/{id}', ['as' => 'admin.slideshow.update', 'uses' => 'Admin\SlideShowController@update']);
        Route::get('admin/slideshow/delete/{id}', ['as' => 'admin.slideshow.delete', 'uses' => 'Admin\SlideShowController@destroy']);
        /* end slideshow */

        /* news */
        Route::get('admin/news/index', ['as' => 'admin.news.index', 'uses' => 'Admin\NewsController@list']);
        Route::get('admin/news/show/{id}', ['as' => 'admin.news.show', 'uses' => 'Admin\NewsController@show']);
        Route::get('admin/news/create', ['as' => 'admin.news.create', 'uses' => 'Admin\NewsController@create']);
        Route::post('admin/news/store', ['as' => 'admin.news.store', 'uses' => 'Admin\NewsController@store']);
        Route::get('admin/news/edit/{id}', ['as' => 'admin.news.edit', 'uses' => 'Admin\NewsController@edit']);
        Route::put('admin/news/update/{id}', ['as' => 'admin.news.update', 'uses' => 'Admin\NewsController@update']);
        Route::get('admin/news/delete/{id}', ['as' => 'admin.news.delete', 'uses' => 'Admin\NewsController@destroy']);
        /* end news */


        /* annonce */
        Route::get('admin/annonce/index', ['as' => 'admin.annonce.index', 'uses' => 'Admin\AnnonceController@list']);
        Route::get('admin/annonce/show/{id}', ['as' => 'admin.annonce.show', 'uses' => 'Admin\AnnonceController@show']);
        Route::get('admin/annonce/create', ['as' => 'admin.annonce.create', 'uses' => 'Admin\AnnonceController@create']);
        Route::post('admin/annonce/store', ['as' => 'admin.annonce.store', 'uses' => 'Admin\AnnonceController@store']);
        Route::get('admin/annonce/edit/{id}', ['as' => 'admin.annonce.edit', 'uses' => 'Admin\AnnonceController@edit']);
        Route::put('admin/annonce/update/{id}', ['as' => 'admin.annonce.update', 'uses' => 'Admin\AnnonceController@update']);
        Route::get('admin/annonce/delete/{id}', ['as' => 'admin.annonce.delete', 'uses' => 'Admin\AnnonceController@destroy']);
        /* end annonce */



        /* configuration */
        Route::get('admin/configuration/show', ['as' => 'admin.configuration.show', 'uses' => 'Admin\ConfigurationController@show']);
        Route::get('admin/configuration/edit/{id}', ['as' => 'admin.configuration.edit', 'uses' => 'Admin\ConfigurationController@edit']);
        Route::put('admin/configuration/update/{id}', ['as' => 'admin.configuration.update', 'uses' => 'Admin\ConfigurationController@update']);
        /* end configuration */

        /* estatisticas */
        Route::get('admin/estatistica/status', ['as' => 'admin.estatistic.status', 'uses' => 'Admin\EstatisticController@status']);
        Route::get('admin/estatistica/nivel-academico', ['as' => 'admin.estatistic.academiclevel', 'uses' => 'Admin\EstatisticController@academiclevel']);
        Route::get('admin/estatistica/provincias', ['as' => 'admin.estatistic.province', 'uses' => 'Admin\EstatisticController@province']);

        Route::get('admin/estatistica/provinciasapto', ['as' => 'admin.estatistic.provinceapto', 'uses' => 'Admin\EstatisticController@provinceapto']);
        Route::get('admin/estatistica/municipios', ['as' => 'admin.estatistic.byCounty', 'uses' => 'Admin\EstatisticController@byCounty']);
        Route::get('admin/estatistica/municipios/show', ['as' => 'admin.estatistic.byCounty.show', 'uses' => 'Admin\EstatisticController@byCountyShow']);



    });
    Route::middleware(['Recruiter'])->group(function () {

        //received
        Route::get('admin/candidacy/received/index', ['as' => 'admin.candidacy.received.index', 'uses' => 'Admin\CandidacyReceivedController@index']);
        Route::get('admin/candidacy/received/show/{id}', ['as' => 'admin.candidacy.received.show', 'uses' => 'Admin\CandidacyReceivedController@show']);
        Route::get('admin/candidacy/received/edit/{id}', ['as' => 'admin.candidacy.received.edit', 'uses' => 'Admin\CandidacyReceivedController@edit']);
        Route::put('admin/candidacy/received/update/{id}', ['as' => 'admin.candidacy.received.update', 'uses' => 'Admin\CandidacyReceivedController@update']);

        //approved
        Route::get('admin/candidacy/approved/index', ['as' => 'admin.candidacy.approved.index', 'uses' => 'Admin\CandidacyApprovedController@index']);
        Route::get('admin/candidacy/approved/show/{id}', ['as' => 'admin.candidacy.approved.show', 'uses' => 'Admin\CandidacyApprovedController@show']);
        Route::get('admin/candidacy/approved/edit/{id}', ['as' => 'admin.candidacy.approved.edit', 'uses' => 'Admin\CandidacyApprovedController@edit']);
        Route::put('admin/candidacy/approved/update/{id}', ['as' => 'admin.candidacy.approved.update', 'uses' => 'Admin\CandidacyApprovedController@update']);

        //failed
        Route::get('admin/candidacy/failed/index', ['as' => 'admin.candidacy.failed.index', 'uses' => 'Admin\CandidacyFailedController@index']);
        Route::get('admin/candidacy/failed/show/{id}', ['as' => 'admin.candidacy.failed.show', 'uses' => 'Admin\CandidacyFailedController@show']);
        Route::get('admin/candidacy/failed/edit/{id}', ['as' => 'admin.candidacy.failed.edit', 'uses' => 'Admin\CandidacyFailedController@edit']);
        Route::put('admin/candidacy/failed/update/{id}', ['as' => 'admin.candidacy.failed.update', 'uses' => 'Admin\CandidacyFailedController@update']);

        //print credencial
        Route::get('admin/credencial/print/{id}', ['as' => 'admin.credencial.print', 'uses' => 'Admin\CredencialController@print']);
    });
    Route::middleware(['Examinador'])->group(function () {

        /* question */
        Route::get('admin/question/index', ['as' => 'admin.question.index', 'uses' => 'Admin\QuestionController@index']);
        Route::get('admin/question/show/{id}', ['as' => 'admin.question.show', 'uses' => 'Admin\QuestionController@show']);

        Route::get('admin/questions/create', ['as' => 'admin.question.create', 'uses' => 'Admin\QuestionController@create']);
        Route::post('admin/question/store', ['as' => 'admin.question.store', 'uses' => 'Admin\QuestionController@store']);
        Route::get('admin/question/edit/{id}', ['as' => 'admin.question.edit', 'uses' => 'Admin\QuestionController@edit']);
        Route::put('admin/question/update/{id}', ['as' => 'admin.question.update', 'uses' => 'Admin\QuestionController@update']);
        Route::get('admin/question/destroy/{id}', ['as' => 'admin.question.destroy', 'uses' => 'Admin\QuestionController@destroy']);
        /* end question */
    });


});
