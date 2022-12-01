<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Auth;

class SentMail extends Mailable
{
    use Queueable, SerializesModels;

    public $scout;
    
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($scout)
    {
        $this->scout=$scout;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from(Auth::user()->email)->subject('WHOLESALE NOTIFICATION SYSTEM')->view('mailview');
    }
}
