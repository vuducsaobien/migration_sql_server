<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;

class TestLogJob2 implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $queue_first_name;
    protected $queue_last_name;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Request $request)
    {
        $firstName = $request->first_name;
        $lastName  = $request->last_name;

        if ( !empty($firstName) && !empty($lastName) ) {
            echo '<h3>' . __METHOD__ . '</h3>';
            echo '<pre style="color:red";>$firstName === '; print_r($firstName);echo '</pre>';
            echo '<pre style="color:red";>$lastName === '; print_r($lastName);echo '</pre>';

            $this->queue_first_name = $firstName;
            $this->queue_last_name = $lastName;
            
        }
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Log::info("Message Queue in Log", ['firstName' => $this->queue_first_name, 'lastName' => $this->queue_last_name]);
    }
}
