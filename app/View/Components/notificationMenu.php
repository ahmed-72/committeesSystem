<?php

namespace App\View\Components;

use Illuminate\Support\Facades\Auth;
use Illuminate\View\Component;

class notificationMenu extends Component
{
    public $notifications;
    public $unredCount;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $user=Auth::user();
        $notifications=$user->notifications;
       $this->unredCount=$user->unreadNotifications->count();
        $this->notifications=$user->notifications;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.notification-menu',[
             'notifications'=>$this->notifications,
        ]);
    }
}
