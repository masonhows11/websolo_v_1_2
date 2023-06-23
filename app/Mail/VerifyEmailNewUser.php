<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class VerifyEmailNewUser extends Mailable
{
    use Queueable, SerializesModels;


    public $user;
    public $code;

    /**
     * Create a new message instance.
     *
     * @param User $user
     * @param $code
     */
    public function __construct(User $user,$code)
    {
        //
        $this->user = $user;
        $this->code = $code;
    }

    /**
     * Get the message envelope.
     *
     * @return Envelope
     */
    public function envelope()
    {
        return new Envelope(
            subject: 'تایید ایمیل کاربر جدید',
        );
    }

    /**
     * Get the message content definition.
     *
     * @return Content
     */
    public function content()
    {
        return new Content(
            markdown: 'emails.VerifyEmailNewUser',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array
     */
    public function attachments()
    {
        return [];
    }
}
