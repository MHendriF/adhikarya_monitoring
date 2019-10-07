<?php

namespace App\Console\Commands;

use Mail;
use App\User;
use App\Mail\Reminder;

use Illuminate\Console\Command;

class ReminderUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'reminder:user';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send email reminder';

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
        $user = User::find(1);
        Mail::to($user->email)->send(new Reminder($user));
        echo "Operation done";
    }
}
