<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class markNotificationAsRead
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $notificationID = $request->query('notificationID');
        if(Auth::check() && $notificationID ){
           $user= Auth::user();
           $notification=$user->notifications->find($notificationID);
           if($notification && $notification->unread() ){
            $notification->markAsRead();
           }      
          }
        return $next($request);
    }
}
