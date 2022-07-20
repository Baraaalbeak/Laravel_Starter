<?php

namespace App\Console\Commands;

use App\Mail\notifyuser;
use \App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class notify extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:notify';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'notify user every day by mail automatically';

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
        $emails = user::select('email')->get();
//        $emails = user::pulck('email')->toArray();
        $data = ['title' => 'programming', 'body' => 'php'];
        foreach ($emails as $email){
            Mail::to($email) -> send(new notifyuser($data));
        }
        echo 'succes';

    }
}
