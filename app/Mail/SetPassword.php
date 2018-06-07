<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SetPassword extends Mailable 
{
    use Queueable, SerializesModels;

    protected $token;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(string $newtoken) {
        $this->token = $newtoken;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build() {
        return $this->markdown('mail.confirm')->with(["token"=>$this->token]);
    }
}
