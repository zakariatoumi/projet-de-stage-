<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Like;
use App\Publication;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class PublicationController extends Controller
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
        $publications=Publication::orderBy('created_at','desc')->get();
        return view('Pages.index',['publication' => $publications]);
    }

    public function publicationLikePublication(Request $request)
       {
            $post_id = $request['postId'];
            $is_like = $request['isLike'] === 'true';
            $update = false;
            $post = Publication::find($post_id);
            if (!$post) {
                return null;
            }
            $user = Auth::user();
        $like = $user->likes()->where('publications_id', $post_id)->first();
        if ($like) {
            $already_like = $like->like;
            $update = true;
            if ($already_like == $is_like) {
                $like->delete();
                return null;
            }
        } else {
            $like = new Like();
        }
        $like->like = $is_like;
        $like->user_id = $user->id;
        $like->publications_id = $post->id;
        if ($update) {
            $like->update();
        } else {
            $like->save();
        }
        return null;
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
            
            'titre' => 'required|string|max:255',
            'body' => 'required|string|max:100000',
            
          ]);

          $publ= new Publication(); 
        $publ->titre = $request->input('titre');   
        $publ->body = $request->input('body');
        $publ->user_id = auth()->user()->id;
        $publ->save();
        return back();
    }

    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $modifierid = Publication::find($id);
       
        return view('Pages.modifierTable',['modifPublication'=>$modifierid]);
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
            
            'titre' => 'required|string|max:255',
            'body' => 'required|string|max:100000',
            
          ]);
          
          $modPublication = Publication::find($id);
          $modPublication->titre = $request->input('titre');
          $modPublication->body = $request->input('body');
          $modPublication->save();
          return redirect('index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = Publication::find($id);
        $delete->delete();
        return redirect('index');
    }

    /*public function show($id)
    {
        $showpublication = Publication::find($id);
        return view('Pages.Apublication',['showpublication'=>$showpublication]);
    }
    */
}
