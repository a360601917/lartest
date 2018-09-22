<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class TestJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    
protected $user;

/**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(\App\Models\User $user)
    {
      $this->user=$user;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
      file_put_contents(public_path().'/1.txt', now()->toDateTimeString()."\r\n\r\n", FILE_APPEND);
    }
}
