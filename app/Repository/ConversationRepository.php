<?php

namespace  App\Repository;


use App\Models\Message;
use App\Models\User;



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

}
