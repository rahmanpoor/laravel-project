<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SendSmsToUsers implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    public $sms;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(SMS $sms)
    {
        $this->sms = $sms;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
         //send sms
    }
}
