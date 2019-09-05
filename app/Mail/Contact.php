<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\User;
use App\Ad;

class Contact extends Mailable
{
    use Queueable, SerializesModels;

    protected $ad, $user;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Ad $ad, User $user)
    {
        $this->ad = $ad;
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mail.mail')->with([
            'subject' => $this->ad->title
        ]);
    }
}
