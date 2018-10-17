<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\pays;
use App\ville;

class PaysController extends Controller
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
        $pays=pays::orderBy('created_at','desc')->paginate(10);
        return view('Pages.tablePays',['pays' => $pays]);
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
        $modifierid = pays::find($id);
       
        return view('Pages.modifierTable',['modifpays'=>$modifierid]);
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

            'nomPays' => 'required|string|max:255',
            
          ]);
          
        $modPays = pays::find($id);
        $modPays->nomPays = $request->input('nomPays');
        $modPays->save();
        return redirect('pays')->with('success','Modifier pays valide');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = pays::find($id);
        $delete->delete();
        return back();
    }

    
    public function searchPays(Request $request)
 
    {
        $q = $request->input('q');
        $Tpays = pays::where('nomPays','LIKE','%'.$q.'%')->paginate(10);
        if(count($Tpays) > 0){
        return view('Pages.tablePays',['Tpays'=>$Tpays]);
        }else{
            $errors='Aucune pays de cette recherche!!';
           return view('Pages.tablePays',['erro'=>$errors,'q'=>$q]); 
           }
        

    }
}
