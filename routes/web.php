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
    return view('auth.login');
});

Route::get('registre', function () {
    return view('Pages.register');
});

Route::get('annuaire', 'AnnuaireController@index');

Route::get('createEntreprise', 'createController@index')->middleware('auth');

Route::get('/ajax-ville', 'createController@filtreavecpays');

Route::get('/ajax-secteur', 'createController@drops');

/*supprimmer*/

Route::delete('details/{id}','AnnuaireController@destory');

/*supprimmer*/

Route::post('createEntreprise', 'createController@store');

Route::get('details/{id}', 'AnnuaireController@show');

/* modifier entreprise */

Route::get('details/{id}/modifierEntreprise', 'AnnuaireController@edit')->name('details');

Route::put('details/{id}', 'AnnuaireController@update');

/* modifier entreprise */

/* recherche */
Route::post('rechercheEntreprise','AnnuaireController@search');

Route::get('rechercheEntreprise',function()
{
	return view('Pages.annuaire');
});
/* recherche */

Auth::routes();

Route::get('/home', 'ConversationsController@index')->name('home');

Route::get('/conversations', 'ConversationsController@index')->name('conversations');

Route::get('/conversations/{user}', 'ConversationsController@show')
->middleware('auth')
->middleware('can:talkTo,user')
->name('conversations.show');

Route::post('/conversations/{user}', 'ConversationsController@store')
->middleware('can:talkTo,user');


/* publication like */

Route::get('/publication', 'PublicationController@index');
Route::post('/like','PublicationController@publicationLikePublication')->name('like');

/* publication like */

/* ajouter publication */
Route::post('/AjouterPublication','PublicationController@store');
Route::get('/index','PublicationController@index');
/* ajouter publication */

/* supprimer publication */

Route::delete('index/{id}','PublicationController@destroy');

/* supprimer publication */

/* modifier publication */

Route::get('index/{id}/modifierTable', 'PublicationController@edit')->name('index');
Route::put('index/{id}', 'PublicationController@update');

/* modifier publication */


/* modifier compte */

Route::get('/compte/{id}','CompteController@index');

Route::get('compte/{id}/modifier', 'CompteController@edit')->name('compte');

Route::put('compte/{id}','CompteController@update');

/* modifier compte */

/* supprimer compte */

Route::delete('compte/{id}','CompteController@destroy');

/* supprimer compte */

// profile de user

//Route::get('profile', 'ProfileController@profile');
Route::post('profile', 'ProfileController@update_avatar');

/* router de filtrage */

Route::post('filtre','AnnuaireController@filtreDropdown')->name('filtre');
Route::get('filtre',function()
{
	return view('Pages.filtre');
});

/* router de filtrage */

/* router de administration publication */

Route::get('Apublication','AdministrationController@index');

Route::get('show/{id}','AdministrationController@show');

Route::delete('publication/{id}','AdministrationController@destroy');

Route::get('Apublication/{id}/modifierTable', 'AdministrationController@edit1')->name('Apublication');
Route::put('Apublication/{id}', 'AdministrationController@update');

/* router de administration publication */

/* remplir les tables */

Route::get('remplirtable','RemplirController@index');

Route::post('createPays', 'RemplirController@createpays');

Route::post('createVille', 'RemplirController@createville');

Route::post('createType_organisme', 'RemplirController@type_organisme');

Route::post('secteur', 'RemplirController@Tsecteur');

Route::post('Sosecteur', 'RemplirController@TSosecteur');



/* remplir les tables */

/* tous les users */

Route::get('user','CompteController@indexUser');

Route::put('tousUser/{id}/activer','CompteController@valide');

/* tous les users */

Route::get('searchUser','SearchController@search');
Route::get('searchpub','SearchController@searchPublication');
Route::get('searchentreprise','SearchController@searchEntreprise');

/* tous les entreprises */

Route::get('compte/{id}/modifier', 'CompteController@edit')->name('compte');
Route::put('tousEntreprises/{id}/publier','AdministrationController@publierEntreprise');
Route::delete('tousEntreprises/{id}','AdministrationController@destroyEntreprise');
Route::get('/showEntreprises/{id}','AdministrationController@edit');
Route::get('tousEntreprises','AdministrationController@showEntreprise');

/* tous les entreprises */

/* les tables pays */

Route::get('pays', 'PaysController@index');
Route::delete('pays/{id}','PaysController@destroy');
Route::get('Tpays/{id}/modifierTable', 'PaysController@edit')->name('Tpays');
Route::put('pays/{id}','PaysController@update');
Route::get('searchpays','PaysController@searchPays');

/* les tables pays */


/* les tables villes */

Route::get('villes', 'VilleController@index');
Route::get('Tvilles/{id}/modifierTable', 'VilleController@edit')->name('Tvilles');
Route::put('villes/{id}','VilleController@update');
Route::delete('villes/{id}','VilleController@destroy');
Route::get('searchville','VilleController@searchVille');

/* les tables villes */


/* les tables Type Organisme */

Route::get('typeOrg', 'TypeOrgController@index');
Route::delete('typeOrg/{id}','TypeOrgController@destroy');
Route::get('TtypeOrg/{id}/modifierTable', 'TypeOrgController@edit')->name('TtypeOrg');
Route::put('typeOrg/{id}','TypeOrgController@update');
Route::get('searchtypeOrg','TypeOrgController@searchTypeOrg');

/* les tables Type Organisme */


/* les tables Secteur */

Route::get('secteur', 'SecteurController@index');
Route::delete('secteur/{id}','SecteurController@destroy');
Route::get('Tsecteur/{id}/modifierTable', 'SecteurController@edit')->name('Tsecteur');
Route::put('secteur/{id}','SecteurController@update');
Route::get('searchsecteur','SecteurController@searchSecteur');

/* les tables Secteur */


/* les tables Sous Secteur */

Route::get('Ssecteur', 'Sous_SecteurController@index');
Route::get('TSsecteur/{id}/modifierTable', 'Sous_SecteurController@edit')->name('TSsecteur');
Route::put('Ssecteur/{id}','Sous_SecteurController@update');
Route::delete('Ssecteur/{id}','Sous_SecteurController@destroy');
Route::get('searchSoussecteur','Sous_SecteurController@searchSsecteur');

/* les tables Sous Secteur */

