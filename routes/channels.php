<?php

use Illuminate\Support\Facades\Broadcast;

/*
|--------------------------------------------------------------------------
| Broadcast Channels
|--------------------------------------------------------------------------
|
| Here you may register all of the event broadcasting channels that your
| application supports. The given channel authorization callbacks are
| used to check if an authenticated user can listen to the channel.
|
*/

Broadcast::channel('App.Models.User.{id}', function ($user, $id) {
    return (int) $user->id === (int) $id;
});
Broadcast::channel('chat.{userId}', function ($user, $userId) {
    // Check if the user is authenticated
    if ($user) {
        // Check if the authenticated user's ID matches the {userId} parameter
        if ($user->id == $userId) {
            // User is authorized to access the private channel
            return true;
        } else {
            // User is not authorized; deny access
            return false;
        }
    } else {
        // User is not authenticated; deny access
        return false;
    }
});
