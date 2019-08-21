<?php

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

<<<<<<< HEAD
Broadcast::channel('App.UserController.{id}', function ($user, $id) {
=======
Broadcast::channel('App.User.{id}', function ($user, $id) {
>>>>>>> 83a6d5e77d80b4399a83c30329420fa2b104e5be
    return (int) $user->id === (int) $id;
});
