<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/dashboard', 'HomeController@dashboard')->name('dashboard');


//Route::get('client','FrontController@index')->name('client');

Route::resource('client','FrontController');

Route::resource('user_data', 'UpdateUserDataController');

Route::get('relationclient','relationClientController@index')->name('relationclient');

Route::get('generate-pdf/{id}','PDFController@generatePDF')->name('generate-pdf');
Route::get('projets','ProjectController@index')->name('projets');

Route::get('create-devis','devisController@create')->name('create-devis');
Route::post('devis-store', 'devisController@store')->name('devis.store');
Route::post('devis-lignes-store','DevisLignesController@store')->name('devis-lignes-store');
Route::get('devis-list','devisController@index')->name('devis-list');
Route::get('devis-pdf/{id}','PDFController@getDevisPdf')->name('devis-pdf');

Route::get('edit-status/{id}','devisController@edit')->name('edit-status');

Route::get('edit-status_travaux/{id}','TravauxController@edit')->name('edit-status_travaux');


Route::get('suivis','SuiviController@index')->name('suivis');

Route::get('projet-create','ProjectController@create')->name('projet-create');

Route::post('create-projet','ProjectController@store')->name('create-projet');
Route::post('create-travaux','TravauxController@store')->name('create-travaux');

Route::get('projet-details/{id}','ProjectController@show')->name('projet-details');

Route::get('decaissements','DecaissementController@index')->name('decaissements');

Route::get('decaissement-pdf/{id}','DecaissementController@decaissementPdf')->name('decaissement-pdf');

Route::get('decharge-pdf/{id}','DecaissementController@dechargePdf')->name('decharge-pdf');

Route::get('search','devisController@search')->name('search');

Route::get('searchProjet','ProjectController@search')->name('searchProjet');

Route::get('searchDecaissement','DecaissementController@search')->name('searchDecaissement');

Route::get('create-contrainte','contrainteController@create')->name('create-contrainte');
Route::post('contrainte','contrainteController@store')->name('contrainte');
Route::get('list-contraintes','contrainteController@index')->name('list-contraintes');
Route::get('searchContraintes','contrainteController@test')->name('searchContraintes');
Route::get('edit-status-contrainte/{id}','contrainteController@edit')->name('edit-status-contrainte');
Route::get('back','devisController@precedent')->name('back');

Route::get('decaissements/{id}','DecaissementController@validateDecaissement')->name('validateDecaissement');

Route::get('timeline/{id}','ProjectController@timeline')->name('timeline');

Route::post('create-fournisseur','FournisseurController@store')->name('create-fournisseur');

Route::get('fournisseur-create','FournisseurController@create')->name('fournisseur-create');

Route::get('list-fournisseurs','FournisseurController@index')->name('list-fournisseurs');


Route::get('searchFournisseur','FournisseurController@search')->name('searchFournisseur');
Route::get('filter/{slug}','FournisseurController@filter')->name('filter');


Route::post('create-prestataire','prestataireController@store')->name('create-prestataire');

Route::get('prestataire-create','prestataireController@create')->name('prestataire-create');

Route::get('list-prestataire','prestataireController@index')->name('list-prestataire');

Route::get('searchPrestataire','prestataireController@search')->name('searchPrestataire');

Route::get('filterPrestataire/{slug}','prestataireController@filterPrestataire')->name('filterPrestataire');
Route::get('filterdevis/{slug}','devisController@filterdevis')->name('filterdevis');
Route::get('fileimport','ImportController@index')->name('fileimport');
Route::post('file','ImportController@store')->name('file');












