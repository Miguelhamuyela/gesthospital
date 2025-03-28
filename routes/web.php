<?php

use Illuminate\Support\Facades\Route;

/* SITE */

route::get('/', ['as' => 'site.home', 'uses' => 'Site\HomeController@index']);

/* noticias */
Route::get('noticias', ['as' => 'site.news', 'uses' => 'Site\NewsController@index']);
Route::get('noticia/{title}', ['as' => 'site.news.show', 'uses' => 'Site\NewsController@show']);

/**Perfil Requisitado */
Route::get('perfil-requisitado', ['as' => 'site.profile', 'uses' => 'Site\ProfileController@index']);

/** definicoes */
Route::get('definição', ['as' => 'site.definition', 'uses' => 'Site\DefinitionController@index']);

Route::get('regulamentos', ['as' => 'site.regulation', 'uses' => 'Site\RegulationController@index']);

Route::get('anuncios', ['as' => 'site.announcent', 'uses' => 'Site\AnnouncementController@index']);
Route::get('anuncio/{title}', ['as' => 'site.announcent.show', 'uses' => 'Site\AnnouncementController@show']);


Route::get('pesquisar', ['as' => 'site.search', 'uses' => 'Site\SearchController@create']);
Route::get('pesquisar/find', ['as' => 'site.search.find', 'uses' => 'Site\SearchController@find']);


/* policyPrivacy */
Route::get('politicas-de-privacidade', ['as' => 'site.policyPrivacy', 'uses' => 'Site\PolicyPrivacyController@index']);


/* Minha Candidatura */
Route::get('minha-candidatura', ['as' => 'site.candidacy.verify', 'uses' => 'Site\CandidacyStatusController@index']);
Route::get('minha-candidatura/show', ['as' => 'site.candidacy.show', 'uses' => 'Site\CandidacyStatusController@show']);


/* Verificação do Credencial */
Route::get('credencial/verify/{bi}', ['as' => 'site.credencial.verify', 'uses' => 'Site\CredencialController@verify']);


Route::get('documentos', ['as' => 'site.downloadDocuments', 'uses' => 'Site\TabletController@downloadDocuments']);

/* END SITE */

/* inclui as rotas de autenticação do ficheiro auth.php */
require __DIR__ . '/auth.php';

require __DIR__ . '/admin.php';
