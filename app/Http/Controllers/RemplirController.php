<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\pays;
use App\ville;
use App\type_organismes;
use App\secteur;
use App\sous_secteur;
use App\Http\Controllers\Responce;

class RemplirController extends Controller
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
        $pays=pays::all();
        $secteur=secteur::all();
        return view('Pages.remplirTables',['pays'=>$pays,'secteur'=>$secteur]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createpays(Request $request)
    {
        $this->validate($request, [

            'nomPays' => 'required|string|max:255',
            
          ]);

          $pay= new pays(); 
          $pay->nomPays = $request->input('nomPays');  
          $pay->save();
          return back()->with('success','Pays create success');
    }

    public function createville(Request $request)
    {
        $this->validate($request, [

            'nomVille' => 'required|string|max:255',
            'pays' => 'required|exists:pays,id',
            
          ]);
         
            $vil= new ville(); 
            $vil->nomVille = $request->input('nomVille'); 
            $vil->pays_id = $request->pays; 
            $vil->save();
            return back()->with('success','Ville create success');
    }

    public function type_organisme(Request $request)
    {
        $this->validate($request, [

            'type_org' => 'required|string|max:255',
            
          ]);
         
            $vil= new type_organismes(); 
            $vil->type_org = $request->input('type_org');
            $vil->save();
            return back()->with('success','Type organismes create success');
    }

    public function Tsecteur(Request $request)
    {
        $this->validate($request, [

            'secteur' => 'required|string|max:255',
            'discription' => 'required|string|max:100000',
            
          ]);
         
            $vil= new secteur(); 
            $vil->secteur = $request->input('secteur');
            $vil->discription = $request->input('discription');
            $vil->save();
            return back()->with('success','Secteur create success');
    }

    public function TSosecteur(Request $request)
    {
        $this->validate($request, [
            'secteurs' => 'required|exists:secteurs,id',
            'Ssecteur' => 'required|string|max:255',
            'description' => 'required|string|max:100000',
          ]);
         
            $vil= new sous_secteur(); 
            $vil->Ssecteur = $request->input('Ssecteur');
            $vil->description = $request->input('description');
            $vil->secteur_id = $request->secteurs; 
            $vil->save();
            return back()->with('success','Sous secteur create success');
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
