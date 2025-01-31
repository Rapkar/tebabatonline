<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class VisitNotification extends Notification
{
    use Queueable;
    public $user;
    public $visit_id;
    /**
     * Create a new notification instance.
     */
    public function __construct($user,$visit_id)
    {
        $this->user = $user;
        $this->visit_id = $visit_id;
        //
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['database'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->line('The introduction to the notification.')
            ->action('Notification Action', url('/'))
            ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
    public function toDatabase($notifiable)
    {
        return [
            'message' => $this->user->name.' فرم ویزیت جدیدی ثبت کرد',
            'visit_id' => $this->visit_id,
            'created_at' => now(),
        ];
    }
}
