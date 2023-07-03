<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class AdminAuthNotification extends Notification implements shouldQueue
{
    use Queueable;


    public $admin;
    public $code;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($admin, $code)
    {
        //
        $this->admin = $admin;
        $this->code = $code;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param mixed $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param mixed $notifiable
     * @return MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('وب سولو تاییدیه ورود پنل مدیریت')
            ->from('admin_websolo@mail.ir')
            ->greeting('Websolo')
            ->line('Dear User')
            ->line('admin panel active code for admin user :')
            ->line("admin: $this->admin")
            ->line("active code : $this->code");
    }

    /**
     * Get the array representation of the notification.
     *
     * @param mixed $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
