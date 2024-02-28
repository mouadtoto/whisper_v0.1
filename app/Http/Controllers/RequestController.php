<?php

namespace App\Http\Controllers;

use App\Models\Request as ModelsRequest;
use App\Models\Request as FriendRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class RequestController extends Controller
{
    public function index()
    {
        return to_route('dashboard');
    }
    public function storeRequest(Request $request)
    {
        $username = $request->username;
        $currentUser = auth()->user();
        $user = User::where('username', $username)->first();
        $request = ModelsRequest::where('from_id' ,$currentUser->id)
        ->where('to_id' , $user->id)->first();

        if (!$user) {
            return $this->index()->with('message', 'No user was found');
        }elseif ($request) {
            return $this->index()->with('message', 'Request was already sent');
        }elseif (!$request) {
            ModelsRequest::create([
                'from_id'=>$currentUser->id ,
                'to_id'=>$user->id ,
                'status'=> 'pending'
            ]);
            return $this->index()->with('message', 'Request was sent succesfully');
        }
        
    }

    public function storeQrRequest($id)
    {
        $authenticatedUserId = auth()->user()->id;
        $existingRequest = ModelsRequest::where('from_id', $authenticatedUserId)
            ->where('to_id', $id)
            ->first();
        if ($existingRequest) {
            return redirect()->back();
        } else {
            $req = ModelsRequest::create([
                'from_id' => $authenticatedUserId,
                'to_id' => $id,
                'status' => 'approved',
            ]);

            if ($req) {
                return redirect()->back()->with('message', 'Friend request sent successfully.');
            } else {
                return redirect()->back()->with('error', 'Failed to send friend request.');
            }
        }
    }
    public function getpending()
    {
        $data = ModelsRequest::where('status', 'pending')->where('from_id', auth()->user()->id)->get();
        return json_encode($data);
    }
    public function getFriends()
    {
        $data = ModelsRequest::where('status', 'approved')->where('from_id', auth()->user()->id)->get();
        return json_encode($data);

    }


    public function acceptFriendRequest($friendId)
    {
        try {
            $user = auth()->user();
            if (!$user) {
                throw new \Exception('Utilisateur non connecté.');
            }

            FriendRequest::where('from_id', $friendId)
                ->where('to_id', $user->id)
                ->update(['status' => 'accepted']);

            return Redirect::back()->with('success', 'Demande d\'ami acceptée avec succès.');
        } catch (\Exception $e) {
            return Redirect::back()->with('error', $e->getMessage());
        }
    }

    public function rejectFriendRequest($friendId)
    {
        try {
            $user = auth()->user();
            if (!$user) {
                throw new \Exception('Utilisateur non connecté.');
            }

            FriendRequest::where('from_id', $friendId)
                ->where('to_id', $user->id)
                ->delete();

            return Redirect::back()->with('success', 'Demande d\'ami rejetée avec succès.');
        } catch (\Exception $e) {
            return Redirect::back()->with('error', $e->getMessage());
        }
    }
}
