<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Publication;
use Auth;
use Image;

class CompteController extends Controller
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
    public function index($id)
    {
        $userEd = User::find($id);
        if(auth()->user()->id !== $userEd->id){ 
            return redirect('/');      
        }
            return view('Pages.compte',['userEd' => $userEd]);
        
       
        //return view('Pages.compte');
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
        
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $modifierid = User::find($id);
       
        return view('Pages.modifier',['modifCompte'=>$modifierid]);
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
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'civ' => 'required|string|max:255',
            'Tel' => 'required|string|max:255',
            'poste' => 'required|string|max:255',
            'Email' => 'required|string|max:255',
          ]);
          
        $modPost = User::find($id);
        $modPost->nom = $request->input('nom');
        $modPost->prenom = $request->input('prenom');
        $modPost->civ = $request->input('civ');
        $modPost->Tel = $request->input('Tel');
        $modPost->poste = $request->input('poste');
        $modPost->Email = $request->input('Email');
        $modPost->save();
        return redirect(url('compte',['id'=>$modPost->id]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $delete = User::find($id);
        $delete->delete();
        $delete->publications()->delete();
        return redirect('login');
    }

    protected function indexUser()
    {
        $user = User::orderBy('created_at','desc')->paginate(10);
        return view('Pages.tousUser',['user'=>$user]);
    }

    //Activer disactiver user
    public function valide(Request $request,$id){
        $video = User::find($id);
        $v = $request->input('exampleSwitch'.$video->id);

        if($v===null){
            $video->etat = 1;
        }else{
            $video->etat = 0;
        }
        $video->save();
        return back();
    }
}
