<?php

namespace App\Repository;

use App\User;
use App\Message;
use Illuminate\Database\Eloquent\Builder;
use Carbon\Carbon;

class ConversationRepository{

    private $user;
    private $message;

    public function __construct(User $user,Message $message){
        $this->user = $user;
        $this->message = $message;
    }
  
    public function getconversations (int $userid) {
        $conversations = $this->user->newQuery() 
        ->select('prenom','id','avatar')
        ->where('id','!=', $userid)
        ->get();
        return $conversations;
    }

    public function createmessage(string $content,int $from,int $to)
    {
        return $this->message->newQuery()->create([
           'content'=>$content,
           'from_id'=>$from,
           'to_id'=>$to,
           'created_at'=>Carbon::now()
        ]);
    }


    public function getMessagesFor(int $from, int $to): Builder
    {
        return $this->message->newQuery()
        ->whereRaw("((from_id = $from AND to_id = $to) OR (from_id = $to AND to_id = $from))")
        ->orderBy('created_at','DESC');
    }
 
    // afficher le nombre de message
    public function unreadCount(int $userId)
    {
        return $this->message->newQuery()->where('to_id',$userId)
        ->groupBy('from_id')
        ->selectRaw('from_id, COUNT(id) as count')
        ->whereRaw('read_at IS NULL')
        ->get()
        ->pluck('count','from_id');
    }

    // marque tout les messages de utilisateur comme lu
    public function readAllFrom(int $from,int $to)
    {
        $this->message->where('from_id',$from)->where('to_id',$to)->update(['read_at'=>Carbon::now()]);
    }
}

?>