<?php

namespace  App\Repository;


use App\Models\Message;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;


class  ConversationRepository
{
    /**
     * @var User
     */
    private  $user;
    /**
     * @var Message
     */
    private Message $message;


    public function __construct(User $user , Message $message)
    {
         $this->user = $user;
         $this->message =$message;
    }
    public  function getConversations($userId)
    {
       return  $this->user->newQuery()->where('id', '!=',$userId)->get();

    }
    public function createMessage($content , $from , $to)
    {
      return   $this->message->newQuery()->create([
            'content' => $content,
            'from_id' => $from,
            'to_id'=> $to
        ]);

    }
     public function getMessagesFor($from,$to) :Builder
     {
          return $this->message->newQuery()->whereRaw("((from_id =$from AND to_id =$to)OR (from_id = $to AND to_id = $from))")
             ->orderBy('created_at','ASC');
     }

}
