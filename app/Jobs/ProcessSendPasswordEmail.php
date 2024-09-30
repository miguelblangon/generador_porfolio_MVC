<?php

namespace App\Jobs;

use App\Mail\AutenticationMessageEmail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class ProcessSendPasswordEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    private $number,$email;
    /**
     * Create a new job instance.
     */
    public function __construct(int $numero, string $email)
    {
        $this->number=$numero;
        $this->email= $email;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Mail::to($this->email)->send(new AutenticationMessageEmail($this->number));
    }
}
