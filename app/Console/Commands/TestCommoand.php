<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class TestCommoand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'lartest:testCommand';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
      $this->info('开始');
      file_put_contents(public_path().'/1.txt', now()->toDateTimeString()."\r\n\r\n", FILE_APPEND);
      $this->info('成功');
    }
}
