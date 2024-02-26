<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Auth\AuthManager;
use App\Models\User;


class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */

     /**
     * @var AuthManager
     */
    private $auth;

    public function __construct(AuthManager $auth)
    {
        $this->auth = $auth;
    }

    public function getUser($userId)
    { 
        return User::findOrFail($userId);
    }

     public function myprofile()
     {
         $userId = $this->auth->user()->id;
         $user = $this->getUser($userId);
         
         return view('profile.myprofile', ['user' => $user]);
     }
    // public function  index()
    // {
    //     return view('conversations/index',['users' => $this->r->getConversations()]);

    // }
    // public function show(User $user)
    // {
    //     return view('conversations/show',[

    //         'users' => $this->r->getConversations($this->auth->user()->id),
    //         'user' => $user,
    //         'messages'=> $this->r->getMessagesFor($this->auth->user()->id,$user->id)->get()
    //     ]);
    // }

    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
