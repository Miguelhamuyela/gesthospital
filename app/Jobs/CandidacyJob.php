<?php

namespace App\Jobs;

use App\Mail\CandidacyMail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;
class CandidacyJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    public $tries = 3;
    private $candidacy;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($candidacy)
    {
        $this->candidacy = $candidacy;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $email = new CandidacyMail($this->candidacy);
        Mail::to($this->candidacy['email'])->send($email);
    }
}
