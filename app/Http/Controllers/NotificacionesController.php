<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NotificacionesController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {   
        //get notifications // unreadNotifications->no leidas   notifications->todas 
        $notificaciones = auth()->user()->unreadNotifications;

        //reset to 0 notifications
        auth()->user()->unreadNotifications->markAsRead();

        return view('notificaciones.index',compact('notificaciones'));
    }
}
