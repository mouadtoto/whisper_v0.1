<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMessageRequest;
use App\Models\User;
use App\Repository\ConversationRepository;
use Illuminate\Auth\AuthManager;
use Illuminate\Http\Request;

class ConversationController extends Controller
{
    /**
     * @var ConversationRepository
     */

    private  $r;
    /**
     * @var AuthManager
     */
    private AuthManager $auth;

    public function __construct(ConversationRepository $conversationRepository, AuthManager $authManager)
    {
        $this->r=$conversationRepository;
        $this->auth = $authManager;


    }
    public function  index()
    {
        return view('conversations/index',['users' => $this->r->getConversations($this->auth->user()->id)]);

    }
    public function show(User $user)
    {

        return view('conversations/show',[

            'users' => $this->r->getConversations($this->auth->user()->id),
            'user' => $user,
            'messages'=> $this->r->getMessagesFor($this->auth->user()->id,$user->id)->get()
        ]);
    }
    public function store(User $user , StoreMessageRequest $request)
    {
      $this->r->createMessage(
          $request ->get('content'),
          $this->auth->user()->id,
          $user->id
      );
      return redirect(route('conversations.show',['user' =>$user->id]));
    }
}
