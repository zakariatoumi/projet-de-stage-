<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\entreprise;
use App\secteur;
use App\sous_secteur;
use App\type_organismes;
use App\ville;
use App\pays;
use App\User;
use Auth;
use DB;
use Image;

class AnnuaireController extends Controller
{

   /* public function __construct()
    {
        $this->middleware('auth',['except'=>['annuaire']]);
    }*/

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pays=pays::all();
        $secteur=secteur::all();
        $Ssecteur=sous_secteur::all();
        $type_org=type_organismes::all();
        $entreprises=entreprise::orderBy('raisonSociale','desc')->paginate(10);
    return view('Pages.annuaire',['entrep'=>$entreprises,'secteurs'=>$secteur,'Ssecteurs'=>$Ssecteur,'type_orgs'=>$type_org,'pay'=>$pays]);
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
       $Ds = entreprise::find($id)
       ->join('secteurs','secteurs.id','=','entreprises.secteur_id')
       ->join('sous_secteurs','sous_secteurs.secteur_id','=','secteurs.id')
       ->join('users', 'users.id', '=', 'entreprises.user_id')
       ->join('pays', 'pays.id', '=', 'entreprises.pays_id')
       ->join('villes', 'villes.id', '=', 'entreprises.ville_id')
       ->join('type_organismes', 'type_organismes.id', '=', 'entreprises.type_org_id')
       ->select('users.*','sous_secteurs.*', 'secteurs.*' , 'entreprises.*','villes.nomVille','pays.nomPays','type_organismes.*')
       ->where('entreprises.entrepriseId', '=', $id)
       ->findOrFail($id);
       return view('Pages.details',['detail'=>$Ds]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,$id)
    {
        $secteur=secteur::all();
        $Ssecteur=sous_secteur::all();
        $pays=pays::all();
        $orgs=type_organismes::all();
        $ville=ville::all();
        $modifierid = entreprise::find($id);
       
        return view('Pages.modifierEntreprise',['modif'=>$modifierid,'pays'=>$pays,'org'=>$orgs,'ville'=>$ville,'secteurs'=>$secteur,'Ssecteurs'=>$Ssecteur]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
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
          ]);

          if($request->hasFile('logo')){
            $logo = $request->file('logo');
            $filename = time() . '.' . $logo->getClientOriginalExtension();
            Image::make($logo)->resize(300, 300)->save( public_path('/storage/cover_images/' . $filename ) );
            $modEntre = Auth::user();
            $modEntre->logo = $filename;
        }else {
            $filename = 'noimage.jpg';
        }

        $modEntre = entreprise::find($id);
        $modEntre->raisonSociale = $request->input('raisonSociale');
        $modEntre->capital = $request->input('capital');
        $modEntre->adresse = $request->input('adresse');
        $modEntre->siteWeb = $request->input('siteWeb');
        $modEntre->logo = $filename;
        $modEntre->discription = $request->input('discription');
        $modEntre->tel = $request->input('tel');
        $modEntre->email = $request->input('email');
        $modEntre->fax = $request->input('fax');
        $modEntre->ville_id = $request->ville;
        $modEntre->pays_id = $request->pays;
        $modEntre->type_org_id = $request->organ;
        $modEntre->secteur_id = $request->secteur;
        $modEntre->save();
        return redirect(url('details',['entrepriseId'=>$modEntre->entrepriseId]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    public function destory($id)
    {
        $delete = entreprise::find($id);
        $delete->delete();
        return redirect('annuaire');
    }

    /* methode de recherche */ 

    public function search(Request $request){
        $q = $request->input('q');
    $entrep = entreprise::where('raisonSociale','LIKE','%'.$q.'%')->paginate(10);
    if(count($entrep) > 0){
        return view('Pages.recherche',['entrep'=>$entrep,'q'=>$q]);
    }
    else{
         $errors='Aucune entreprise de cette recherche!!';
        return view('Pages.recherche',['erro'=>$errors,'q'=>$q]); 
        }
    }

    public function filtreDropdown(Request $request)
    {
        $org = $request->input('orgid');
        $p = $request->input('pays');
        $ville = $request->input('ville');

        $Orgentrep = entreprise::
        join('pays','pays.id', '=','entreprises.pays_id')
        ->join('villes','villes.id','=' ,'entreprises.ville_id') 
        ->join('type_organismes','type_organismes.id', '=','entreprises.type_org_id')
        ->where('type_organismes.id','=',$org)
        ->where('pays.id','=',$p)
        ->where('villes.id','=',$ville)
        ->get();
        if(count($Orgentrep) > 0){
            return view('Pages.filtre',['Orgentrep'=>$Orgentrep,'org'=>$org,'p'=>$p,'ville'=>$ville]);
        }else{
            $error = 'Aucune entreprise !!';
            return view('Pages.filtre',['error'=>$error]);
        }
    }



}
