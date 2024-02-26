<?php

namespace App\Http\Controllers;

use App\Models\Request as ModelsRequest ;
use App\Models\User;
use Illuminate\Http\Request;

class RequestController extends Controller
{
    public function index(){
        return to_route('dashboard'); 
    }
    public function storeRequest(Request $request){
        $username = $request->username ; 
        $id = auth()->user()->id ;
        $user = User::where('username' , $username)->get();
        $exist = ModelsRequest::where('from_id' , auth()->user()->id)->where('to_id' , $user[0]->id)->get();
        if(count($user)>0&&count($exist)==0){
            $req = ModelsRequest::create(
                [
                  'from_id' => $id , 
                  'to_id' => $user[0]->id , 
                  'status' => 'pending',
                ]
            );
            return $this->index()->with('message','Friend Request was sent');
        }
        else{
            return $this->index()->with('message','No user was found');
        }
    }
    
    public function storeQrRequest($id){
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
    
}
