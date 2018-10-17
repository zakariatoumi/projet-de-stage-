<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\secteur;

class SecteurController extends Controller
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
        $secteur=secteur::orderBy('created_at','desc')->paginate(10);
        return view('Pages.tableSecteur',['secteur' => $secteur]);
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
        $modifierid = secteur::find($id);
       
        return view('Pages.modifierTable',['modifsecteur'=>$modifierid]);
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

            'secteur' => 'required|string|max:255',
            'discription' => 'required|string|max:100000',
            
          ]);
          
        $modSecteur = secteur::find($id);
        $modSecteur->secteur = $request->input('secteur');
        $modSecteur->discription = $request->input('discription');
        $modSecteur->save();
        return redirect('secteur')->with('success','Modifier secteur valide');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = secteur::find($id);
        $delete->delete();
        return back();
    }

      
    public function searchSecteur(Request $request)
 
    {
        $q = $request->input('q');
        $Tsecteur = secteur::where('secteur','LIKE','%'.$q.'%')->paginate(10);
        if(count($Tsecteur) > 0){
        return view('Pages.tableSecteur',['Tsecteur'=>$Tsecteur]);
        }else{
            $errors='Aucune secteur de cette recherche!!';
           return view('Pages.tableSecteur',['erro'=>$errors,'q'=>$q]); 
           }
        

    }
}
