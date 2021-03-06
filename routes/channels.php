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

use Illuminate\Support\Facades\Broadcast;


Broadcast::channel('App.User.{id}', function ($user, $id) {
    return true ;
});
//Broadcast::channel('users.{id}', function ($user, $id) {
//
//    return (int) $user->id === (int) $id;
//
//});
Broadcast::channel('App.Notification', function(){
//    $permission = Notification::findOrNew($id)->data['titre'] +'-validate';
//    dd($permission);
//    return $user->id === User::permission( $permission)->get();
    return true;
});
