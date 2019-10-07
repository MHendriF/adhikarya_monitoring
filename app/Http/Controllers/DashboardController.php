<?php

namespace App\Http\Controllers;

use Auth;
use Mail;
use Session;

use App\Mail\Reminder;
use App\User;
use Carbon\Carbon;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function getDashboard()
    {
        return view('pages.master.dashboard');
    }

    public function sendReminder()
    {
        $user = User::find(1);
        Mail::to($user->email)->send(new Reminder($user));
        Session::flash('success', 'Reminder code telah dikirim ke email. Silahkan cek inbox email anda.');
        return view('pages.master.dashboard');
    }
}
