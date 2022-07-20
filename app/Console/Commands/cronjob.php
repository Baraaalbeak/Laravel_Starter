<?php

namespace App\Console\Commands;

//use http\Client\Curl\User;
use \App\Models\User;
use Illuminate\Console\Command;

class cronjob extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:expiration';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'expire users';

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
     * @return int
     */
    public function handle()
    {
        $users = User::where('expire',0)->get();
        foreach ($users as $user){
            $user -> update(['expire' => 1]);
        }
    }
}
