<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ville;
use App\pays;

class VilleController extends Controller
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
        $ville=ville::orderBy('villes.created_at','desc')
        ->join('pays','pays.id','=','villes.pays_id')
        ->select('pays.*','villes.*')
        ->paginate(10);
        return view('Pages.tableVille',['ville' => $ville]);
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
        $pays=pays::all();
        $modifierid = ville::find($id);
       
        return view('Pages.modifierTable',['modifvilles'=>$modifierid,'pays'=>$pays]);
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

            'nomVille' => 'required|string|max:255',
            'pays' => 'required|exists:pays,id',
            
          ]);
          
        $modVilles = ville::find($id);
        $modVilles->nomVille = $request->input('nomVille');
        $modVilles->pays_id = $request->pays;
        $modVilles->save();
        return redirect('villes')->with('success','Modifier ville valide');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = ville::find($id);
        $delete->delete();
        return back();
    }

    public function searchVille(Request $request)
 
    {
        $q = $request->input('q');
        $Tville = ville::
        join('pays','pays.id','=','villes.pays_id')
        ->where('nomVille','LIKE','%'.$q.'%')->paginate(10);
        if(count($Tville) > 0){
        return view('Pages.tableVille',['Tville'=>$Tville]);
        }else{
            $errors='Aucune ville de cette recherche!!';
           return view('Pages.tableVille',['erro'=>$errors,'q'=>$q]); 
           }
        

    }
}
