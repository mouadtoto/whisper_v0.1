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


     public function __construct(User $user, Message $message)
     {
          $this->user = $user;
          $this->message = $message;
     }
     public  function getConversations($userId)
     {
          return  $this->user->newQuery()->where('id', '!=', $userId)->get();
     }
     public function createMessage($content, $from, $to)
     {
          return   $this->message->newQuery()->create([
               'content' => $content,
               'from_id' => $from,
               'to_id' => $to
          ]);
     }
     public function getMessagesFor($from, $to): Builder
     {
          return $this->message->newQuery()->whereRaw("((from_id =$from AND to_id =$to)OR (from_id = $to AND to_id = $from))")
               ->orderBy('created_at', 'ASC');
     }
     public function deleteMessage($messageId)
     {
          $message = Message::findOrFail($messageId);

          // Vérifiez si l'utilisateur a activé la suppression automatique des messages
          if (auth()->user()->message_auto_delete) {
               // Supprimez le message uniquement s'il a été créé il y a plus de 24 heures
               if ($message->created_at->diffInHours(now()) >= 24) {
                    $message->delete();
                    return redirect()->back()->with('success', 'Message deleted successfully.');
               } else {
                    return redirect()->back()->with('error', 'You cannot delete this message as it has not been 24 hours since it was created.');
               }
          } else {
               // Supprimez le message sans vérifier l'heure de création
               $message->delete();
               return redirect()->back()->with('success', 'Message deleted successfully.');
          }
     }
}
