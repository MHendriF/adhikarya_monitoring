<?php

namespace App\Http\Controllers;

use DB;
use Mail;
use Carbon\Carbon;

use App\User;
use App\Models\SchedulerEmail;
use App\Mail\Reminder;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function getScheduler()
    {
        $date = Carbon::now()->toDateString();
        $schedulers = DB::table('scheduler_email')
                          ->join('user', 'scheduler_email.id_user', '=', 'user.id_user')
                          ->where('scheduler_email.schedule_time', '=', $date)
                          ->select('scheduler_email.*', 'user.email')
                          ->get();

        foreach ($schedulers as $key => $scheduler) {
            Mail::to($scheduler->email)->send(new Reminder());
            echo "Operation done";
        }
        return $scheduler;
    }

    public function testData($pic_dokumen)
    {
        $scheduler = SchedulerEmail::where('id_pic_dokumen', '=', $pic_dokumen)->first();
        if ($scheduler === null) {
            return "tidak ada";
        }else{
            return $scheduler;
            return "ada";
        }


        $scheduler = SchedulerEmail::where('id_pic_dokumen', '=', $pic_dokumen)->exists();
        if ($scheduler) {
          return $scheduler;
          return "exist";
        }else{
          return "doesnt exist";
        }

    }

    public function testData2()
    {
        $date1 = Carbon::now()->toDateString();
        $date2 = Carbon::yesterday()->toDateString();

        if ($date1 != $date2) {
            return "tidak sama";
        }else {
            return "sama";
        }
    }
}
