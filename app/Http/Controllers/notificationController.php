<?php

namespace App\Http\Controllers;

use App\Models\sessiontopic;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Auth;

class notificationController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        // dd($user->notifications->toArray());
        $beforMonth = date("Y-m-d H:i:s", strtotime('-30 days'));
        foreach($user->notifications as $notification ){
            if($notification->created_at < $beforMonth && $notification->created_at != null  ){
                $notification->delete();
            }
        }
        return view('pages/committees/notifications')->with('notifications', $user->notifications);
    }
    public function show($notificationID)
    {

        $user = Auth::user();
        $notification = $user->notifications->find($notificationID);
        if($notification && $notification->unread() ){
            $notification->markAsRead();
           } 
        return view('pages/committees/decision')->with('notification', $notification);      
    }

    public function markAsRead($notificationID)
    {
        if(Auth::check()){
           $user= Auth::user();
           $notification=$user->notifications->find($notificationID);
           if($notification && $notification->unread() ){
            $notification->markAsRead();
           }      
          }
        return redirect()->back();
    }
}