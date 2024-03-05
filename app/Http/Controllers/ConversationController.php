<?php

namespace App\Http\Controllers;

use App\Events\MessageEvent;
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

    private  $creatmessage;
    /**
     * @var AuthManager
     */
    private AuthManager $auth;

    public function __construct(ConversationRepository $conversationRepository, AuthManager $authManager)
    {
        $this->creatmessage=$conversationRepository;
        $this->auth = $authManager;


    }
    public function  index()
    {
        return view('conversations/index',['users' => $this->creatmessage->getConversations($this->auth->user()->id)]);

    }
    public function show(User $user)
    {

        return view('conversations/show',[

            'users' => $this->creatmessage->getConversations($this->auth->user()->id),
            'user' => $user,
            'messages'=> $this->creatmessage->getMessagesFor($this->auth->user()->id,$user->id)->get()
        ]);
    }
    public function store(User $user, StoreMessageRequest $request)
    {


        try {
            if (!auth()->check()) {
                throw new \Exception('User is not authenticated.');
            }

            // Get the authenticated user
            $authenticatedUser = auth()->user();
            // Create a new message using the createMessage method
             $this->creatmessage->createMessage(
                $request->get('content'), // Get the content from the request
                 $authenticatedUser->id, // Get the authenticated user's ID
                $request->get('to_id') // Get the ID of the user the message is being sent to
            );
            //event(new NewMessage($request->get('content'), $authenticatedUser,$request->get('to_id'), $authenticatedUser->id));
            event(new MessageEvent($request->get('content'), $authenticatedUser, $authenticatedUser->id,$request->get('to_id')));
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