<?php

namespace App\Notifications;

use App\Models\session;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class sessionNotification extends Notification
{
    use Queueable;
    protected $session;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(session $session)
    {
        $this->session=$session;
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

    /**
    * Get the mail representation of the notification.
    *
    * @param  mixed  $notifiable
    * @return \Illuminate\Notifications\Messages\MailMessage
    */
    public function toDatabase($notifiable)
    {
        return [
            'titel' => " جلسة جديدة للجنة". $this->session->committee->committeeName , 
            'body' =>'بتاريخ'.$this->session->sessionDate ." في قاعة".$this->session->sessionRoom .'من الساعة' .$this->session->sessionStartAt.'إلى الساعة'.$this->session->sessionEndAt ,
            'url' =>route('committee'  ,$this->session->committee_committeeID),
          
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

