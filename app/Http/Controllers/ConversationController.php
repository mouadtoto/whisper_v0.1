<?php

namespace App\Http\Controllers;

use App\Events\NewMessage;
use App\Http\Requests\StoreMessageRequest;
use App\Models\User;
use App\Repository\ConversationRepository;
use Illuminate\Auth\AuthManager;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

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
    public function store(User $user, StoreMessageRequest $request)
    {
        try {
            // Create a new message using the createMessage method
            $message = $this->r->createMessage(
                $request->get('content'), // Get the content from the request
                auth()->user()->id, // Get the authenticated user's ID
                $user->id // Get the ID of the user the message is being sent to
            );

            // Broadcast the NewMessage event
            broadcast(new NewMessage($message->content, auth()->user()))->toOthers();

            // Return a success response
            return response()->json([
                'success' => true,
            ]);
        } catch (\Exception $e) {
            // If an exception occurs, return an error response
            return response()->json([
                'success' => false,
                'error' => $e->getMessage(), // Include the error message in the response
            ], 500); // Use status code 500 for internal server error
        }
    }
}
