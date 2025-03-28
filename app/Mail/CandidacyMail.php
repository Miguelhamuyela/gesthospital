<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CandidacyMail extends Mailable
{
    use Queueable, SerializesModels;

    public $candidacy;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($candidacy)
    {
        $this->candidacy = $candidacy;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Candidatura Efetuada no Portal do CENSO 2024')->view(
            'mail.candidacy.index'
        );
    }
}
