<?php

namespace App\Listeners;

use App\Events\RegisterUserEvent;
use App\Mail\VerifyEmailNewUser;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendEmailRegisterUserListener
{

    //  use InteractsWithQueue;
    
    //    public $connection = 'sqs';
    //
    //    public $queue = 'send_user_email_reg';
    //
    //
    //    public $delay = 10;
    //
    //    public $tries = 3;

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
