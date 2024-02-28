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
use Illuminate\Support\Facades\Cache;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Facades\URL;

use Carbon\Carbon;

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
        $userId = auth()->user()->id;
        $user = $this->getUser($userId);
        $id = auth()->user()->id;
        $url = "localhost/Qr/friend/".$id;
        // $temporaryLink = URL::temporarySignedRoute($url, now()->addHours(1)); 
        $QR = QrCode::generate($url);
        Cache::put('url', $url, now()->addHour());
        return view('profile.myprofile', ['user' => $user])->with('qr', $QR);
    }

    // public function  index()
    // {
    //     return view('conversations/index',['users' => $this->r->getConversations()]);

        // return view('profile.myprofile', ['user' => $user]);
    // }

    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    public function update(ProfileUpdateRequest $request, $userId): RedirectResponse
    {
        $user = $this->getUser($userId);
        if ($user) {

            $validatedData = $request->validate([
                'name' => 'required|string',
                'username' => 'required|string',
                'status' => 'required|string',
                'userImage' => ''
            ]);

            if ($user->isDirty('email')) {
                $user->email_verified_at = null;
            }
            if ($request->hasFile('userImage')) {
                $uploadImage = request()->file('userImage');
                $imageName = time() . '.' . $uploadImage->getClientOriginalExtension();
                $uploadImage->move(public_path('images'), $imageName);
                // $validatedData['userImage'] = $uploadImage;
            } else {
                $validatedData['userImage'] = $user->userImage;
            }

            // echo '<pre>';
            // // print_r($user);
            // $expiryDate = $user->created_at->addHours(24);
            // printf("Now: %s", $expiryDate);
            //  // Get the creation date from the user object and add 24 hours to it
            // echo '</pre>';
            // // echo $user->userImage;
            // exit();
            $user->update([
                'name' => $validatedData['name'],
                'username' => $validatedData['username'],
                'status' => $validatedData['status'],
                'userImage' => $imageName,
            ]);
            return Redirect::route('profile.myprofile')->with('status', 'profile-updated');
        }
        return Redirect::route('profile.myprofile');
    }

    public function updateMessage(Request $request, $userId)
    {
        $user = $this->getUser($userId);

        // Validate the request data
        $request->validate([
            'message_auto_delete' => 'required|boolean', // Assuming the input will be a boolean value
        ]);

        // Update the user's preference for message auto-deletion
        $user->update([
            'message_auto_delete' => $request->input('message_auto_delete'),
        ]);

        return Redirect::route('profile.myprofile')->with('success', 'Message auto-deletion preference updated successfully.');
    }

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
