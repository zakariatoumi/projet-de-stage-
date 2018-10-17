<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\sous_secteur;
use App\secteur;

class Sous_SecteurController extends Controller
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
        $Ssecteur=sous_secteur::orderBy('sous_secteurs.created_at','desc')
        ->join('secteurs','secteurs.id','=','sous_secteurs.secteur_id')
        ->select('secteurs.*','sous_secteurs.*')
        ->paginate(10);
        return view('Pages.tableSsecteur',['Ssecteur' => $Ssecteur]);
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
        $secteurs=secteur::all();
        $modifierid = sous_secteur::find($id);
       
        return view('Pages.modifierTable',['modifSsecteur'=>$modifierid,'secteurs'=>$secteurs]);
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
            'secteurs' => 'required|exists:secteurs,id',
            'Ssecteur' => 'required|string|max:255',
            'description' => 'required|string|max:100000',
          ]);
          
        $modSsecteur = sous_secteur::find($id);
        $modSsecteur->Ssecteur = $request->input('Ssecteur');
        $modSsecteur->description = $request->input('description');
        $modSsecteur->secteur_id = $request->secteur;
        $modSsecteur->save();
        return redirect('Ssecteur')->with('success','Modifier sous secteur valide');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = sous_secteur::find($id);
        $delete->delete();
        return back();
    }

    public function searchSsecteur(Request $request)
 
    {
        $q = $request->input('q');
        $Tsous_secteur = sous_secteur::
        join('secteurs','secteurs.id','=','sous_secteurs.secteur_id')
        ->where('Ssecteur','LIKE','%'.$q.'%')->paginate(10);
        if(count($Tsous_secteur) > 0){
        return view('Pages.tableSsecteur',['Tsous_secteur'=>$Tsous_secteur]);
        }else{
            $errors='Aucune sous secteur de cette recherche!!';
           return view('Pages.tableSsecteur',['erro'=>$errors,'q'=>$q]); 
           }
        

    }
}
