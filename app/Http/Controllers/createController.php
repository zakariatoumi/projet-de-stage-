<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\entreprise;
use App\ville;
use App\pays;
use App\type_organismes;
use Input;
use App\Http\Controllers\Responce;
use App\UploadedFile;
use App\secteur;
use App\sous_secteur;

class createController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        /*$v=ville::all();*/
        $secteur=secteur::all();
        $Ssecteur=sous_secteur::all();
        $pays=pays::all();
        $orgs=type_organismes::all();
        return view('Pages.createEntreprise',['pay'=>$pays,'org'=>$orgs,'secteurs'=>$secteur,'Ssecteurs'=>$Ssecteur]);
    }
    
    public function filtreavecpays()
    {
        $pays_id=Input::get('pays_id');
        $ville = ville::where('pays_id', '=' ,$pays_id)->get();
        /*return \Response::json($ville);*/
        return \Response::json($ville);
    }

    public function drops()
    {
        $secteur_id=Input::get('secteur_id');
        $Ssecteur = sous_secteur::where('secteur_id', '=' ,$secteur_id)->get();
        /*return \Response::json($ville);*/
        return \Response::json($Ssecteur);
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
        $this->validate($request, [
            'raisonSociale' => 'required|string|max:255',
            'adresse' => 'required|string|max:255',
            'discription' => 'required|string|max:100000',
            'email' => 'required|string|email|max:255|unique:users',
            'pays' => 'required|exists:pays,id',
            'ville' => 'required|exists:villes,id',
            'organ' => 'required|exists:type_organismes,id',
            'secteur' => 'required|exists:secteurs,id',
            'Ssecteurs' => 'required|exists:sous_secteurs,id',
          ]);
          if($request->hasFile('logo')){
            // Get filename with the extension
            $filenameWithExt = $request->file('logo')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('logo')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore= $filename.'_'.time().'.'.$extension;
            // Upload Image
            $path = $request->file('logo')->storeAs('public/cover_images', $fileNameToStore);
        } else {
            $fileNameToStore = 'noimage.jpg';
        }
        
        $etrep= new entreprise(); 
        $etrep->raisonSociale = $request->input('raisonSociale'); 
        if ($request->input('capital')) {  
        $etrep->capital = $request->input('capital');
        }else {
            $etrep->capital = "NULL";
        }
        $etrep->discription = $request->input('discription');
        $etrep->adresse = $request->input('adresse');
        if ($request->input('siteWeb')) {
        $etrep->siteWeb = $request->input('siteWeb');
        }else {
            $etrep->siteWeb = "NULL";  
        }
        $etrep->logo =$fileNameToStore;
        if ($request->input('tel')) {
        $etrep->tel = $request->input('tel');
        }else {
            $etrep->tel = "NULL";  
        }
        $etrep->email = $request->input('email');
        if ($request->input('fax')) {
        $etrep->fax = $request->input('fax');
        }else {
            $etrep->fax = "NULL";
        }
        $etrep->ville_id = $request->ville;
        $etrep->pays_id = $request->pays;
        $etrep->type_org_id = $request->organ;
        $etrep->secteur_id = $request->secteur;
        $etrep->user_id = auth()->user()->id;
        $etrep->save();
        return redirect('annuaire')->with('success','Entreprise create success');
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

public function getStates($id) {
$states = DB::table("villes")->where("pays_id",$id)->pluck("nomVille","id");

return json_encode($states);

}
}
