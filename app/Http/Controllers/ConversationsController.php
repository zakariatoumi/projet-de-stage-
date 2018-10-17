<?php

namespace App\Http\Controllers;

use App\Requests;
use Illuminate\Http\Request;
use App\User;
use App\Repository\ConversationRepository;
use Illuminate\Auth\AuthManager;
use App\Notifications\NewMessageNotification;
use Auth;
use App\Notification;

class ConversationsController extends Controller
{
    private $r;

    private $auth;

    public function __construct(ConversationRepository $conversationRepository,AuthManager $auth)
    {
        $this->r = $conversationRepository;
        $this->auth = $auth;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        return view('conversations.index',['users'=>$this->r->getconversations($this->auth->user()->id),
        'unread' => $this->r->unreadCount($this->auth->user()->id)
        ]);
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
    public function store(User $user,Request $request)
    {
        $this->validate($request, [
            'content'=>'required|min:4'
          ]);
         $message = $this->r->createmessage(
            $request->get('content'),
            $this->auth->user()->id,
            $user->id
        );
         Auth()->user()->notify(new NewMessageNotification($message));
         return redirect(route('conversations.show',['id'=>$user->id]));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        $me = $this->auth->user();
        $messages = $this->r->getMessagesFor($me->id,$user->id)->paginate(2);
       $unread = $this->r->unreadCount($me->id);
       if (isset($unread[$user->id])) {
           $this->r->readAllFrom($user->id,$me->id);
           unset($unread[$user->id]);
       }
        return view('conversations.show',[
            'users'=>$this->r->getconversations($this->auth->user()->id),
            'user'=>$user,
            'messages'=>$messages,
            'unread' => $unread
            ]);
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
}
