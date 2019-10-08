<?php

namespace App\Console\Commands;

use DB;

use Carbon\Carbon;

use App\User;
use App\Models\SchedulerEmail;

use Illuminate\Console\Command;

class SendSchedulerEmail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'scheduler:email';

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
        $date = Carbon::now()->toDateString();
        $schedulers = DB::table('scheduler_email')
                          ->join('user', 'scheduler_email.id_user', '=', 'user.id_user')
                          ->where('scheduler_email.schedule_time', '=', $date)
                          ->select('scheduler_email.*', 'user.email')
                          ->get();

        foreach ($schedulers as $key => $value) {
          // code...
        }
    }
}
