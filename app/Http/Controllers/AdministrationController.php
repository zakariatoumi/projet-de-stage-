<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Publication;
use App\User;
use App\entreprise;
use App\pays;
use App\ville;

class AdministrationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $showpub = Publication::orderBy('created_at','desc')->paginate(10);
        return view('Pages.Apublication',['showpub'=>$showpub]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $eye = Publication::find($id)
        ->join('users', 'users.id', '=', 'publications.user_id')
        ->select('users.*','publications.*')
        ->where('publications.id', '=', $id)
        ->findOrFail($id);
        return view('Pages.show',['eyes'=>$eye]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $EntrepriseUser = entreprise::find($id)
        ->join('users', 'users.id', '=', 'entreprises.user_id')
        ->select('users.*','entreprises.*')
        ->findOrFail($id);
        return view('Pages.showDTentreprise',['EntrepriseUser'=>$EntrepriseUser]);
    }

    public function edit1($id)
    {
        $modifierid = Publication::find($id);
       
        return view('Pages.modifierTable',['modifPublication1'=>$modifierid]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            
            'titre' => 'required|string|max:255',
            'body' => 'required|string|max:100000',
            
          ]);
          
          $modPublication = Publication::find($id);
          $modPublication->titre = $request->input('titre');
          $modPublication->body = $request->input('body');
          $modPublication->save();
          return redirect('Apublication');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = Publication::find($id);
        $delete->delete();
        return redirect('index');
    }

    public function destroyEntreprise($id)
    {
        $delete = entreprise::find($id);
        $delete->delete();
        return redirect('annuaire');
    }

    public function showEntreprise()
    {
        $Entreprise = entreprise::orderBy('created_at','desc')->paginate(10);
        return view('Pages.tousEntreprises',['Entreprise'=>$Entreprise]);
    }

     //Activer disactiver user
     public function publierEntreprise(Request $request,$id){
        $video = entreprise::find($id);
        $v = $request->input('exampleSwitch'.$video->entrepriseId);

        if($v===null){
            $video->etat = 1;
        }else{
            $video->etat = 0;
        }
        $video->save();
        return redirect('annuaire');
    }
}
