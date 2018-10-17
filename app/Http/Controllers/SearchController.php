<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\User;
use App\Publication;
use App\entreprise;

class SearchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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

    public function search(Request $request)
 
            {
                $q = $request->input('q');
                $Tuser = User::where('nom','LIKE','%'.$q.'%')->paginate(10);
                if(count($Tuser) > 0){
                return view('Pages.tousUser',['Tuser'=>$Tuser]);
                }else{
                    $errors='Aucune user de cette recherche!!';
                   return view('Pages.tousUser',['erro'=>$errors,'q'=>$q]); 
                   }
                

            }

            public function searchPublication(Request $request)
 
            {
                $q = $request->input('q');
                $Tpub = Publication::where('titre','LIKE','%'.$q.'%')->paginate(10);
                if(count($Tpub) > 0){
                return view('Pages.Apublication',['Tpub'=>$Tpub]);
                }else{
                    $errors='Aucune publication de cette recherche!!';
                   return view('Pages.Apublication',['erro'=>$errors,'q'=>$q]); 
                   }
                

            }

            public function searchEntreprise(Request $request)
 
            {
                $q = $request->input('q');
                $Tentre = entreprise::where('raisonSociale','LIKE','%'.$q.'%')->paginate(10);
                if(count($Tentre) > 0){
                return view('Pages.tousEntreprises',['Tentre'=>$Tentre]);
                }else{
                    $errors='Aucune entreprise de cette recherche!!';
                   return view('Pages.tousEntreprises',['erro'=>$errors,'q'=>$q]); 
                   }
                

            }
        }