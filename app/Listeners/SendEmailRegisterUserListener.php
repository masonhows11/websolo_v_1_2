<?php

namespace App\Listeners;

use App\Events\RegisterUserEvent;
use App\Mail\VerifyEmailNewUser;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendEmailRegisterUserListener implements ShouldQueue
{

    use Queueable;

    //  use InteractsWithQueue;

    //    public $connection = 'sqs';

    //    public $queue = 'send_user_email_reg';


    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }


    /**
     * Handle the event.
     *
     * @param RegisterUserEvent $event
     * @return void
     */
    public function handle(RegisterUserEvent $event)
    {
        //
        Mail::to($event->user->email)->send(new VerifyEmailNewUser($event->user, $event->code));
    }
}
