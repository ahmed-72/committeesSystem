<?php

namespace App\Notifications;

use App\Models\committee;
use App\Models\sessiontopic;
use App\Models\User;
use Illuminate\Broadcasting\Channel;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class UserNotification extends Notification
{
    use Queueable;
protected $topic;
protected $decisionID;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(sessiontopic $topic ,$decisionID )
    {
        $this->topic=$topic;
        $this->decisionID=$decisionID;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        $channels = ['database'];
        // if (in_array('mail', $notifiable->notification_options)) {
        //     $channels[] = 'mail';
        // }
        // if (in_array('sms', $notifiable->notification_options)) {
        //     $channels[]='nexmo';
        // }
        return $channels;
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->line('The introduction to the notification.')
            ->action('Notification Action', url('/'))
            ->line('Thank you for using our application!');
    }

    public function toDatabase($notifiable)
    {
        return [
            'titel' => "قرار صادر عن لجنة". $this->topic->committee->committeeName , 
            'body' => $this->topic->decisions[$this->decisionID] ." \n ".$this->topic->executionDeadline[$this->decisionID] ,
           // 'url' =>route('notification.show'  ,$notification->id),
            //' route('committee',$this->topic->committee_committeeID),
        ];
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
