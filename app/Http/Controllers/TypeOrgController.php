<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\type_organismes;

class TypeOrgController extends Controller
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
        $typeOrg=type_organismes::orderBy('created_at','desc')->paginate(10);
        return view('Pages.tableTypeOrg',['typeOrg' => $typeOrg]);
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
        $modifierid = type_organismes::find($id);
       
        return view('Pages.modifierTable',['modiftypeOrg'=>$modifierid]);
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

            'type_org' => 'required|string|max:255',
            
          ]);
          
        $modTypeOrg = type_organismes::find($id);
        $modTypeOrg->type_org = $request->input('type_org');
        $modTypeOrg->save();
        return redirect('typeOrg')->with('success','Modifier type organisme valide');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = type_organismes::find($id);
        $delete->delete();
        return back();
    }

    public function searchTypeOrg(Request $request)
 
    {
        $q = $request->input('q');
        $TtypeOrg = type_organismes::where('type_org','LIKE','%'.$q.'%')->paginate(10);
        if(count($TtypeOrg) > 0){
        return view('Pages.tableTypeOrg',['TtypeOrg'=>$TtypeOrg]);
        }else{
            $errors='Aucune type organisme de cette recherche!!';
           return view('Pages.tableTypeOrg',['erro'=>$errors,'q'=>$q]); 
           }
        

    }
}
