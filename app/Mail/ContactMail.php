<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

     public $name,$email,$messages;
    public function __construct($name,$email,$messages,$subject)
    {
        $this->name = $name;
        $this->email = $email;
        $this->messages = $messages;
        $this->subject = $subject;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mails.contact_us')
                ->with(
                    ['name' => $this->name,'email' => $this->email,'messages' => $this->messages]
                )->subject($this->subject);
    }
}
