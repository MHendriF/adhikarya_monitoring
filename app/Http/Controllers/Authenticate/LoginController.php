<?php

namespace App\Http\Controllers\Authenticate;

use Auth;
use Mail;
use Session;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\User;
use Carbon\Carbon;

use App\Mail\ResetPasswordCode;

class LoginController extends Controller
{
    public function login()
    {
        if(Auth::check())
            return redirect('dashboard');
        else
            return view('pages.auth.login');
    }

    public function postLogin(Request $request)
    {
        $input = $request->all();
        if (Auth::attempt(['email' => $input['email'], 'password' => $input['password']])) {
            return redirect('dashboard');
        }
        else {
            return back()->withInput()->withErrors(['message' => 'Please check your credentials and try again.']);
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }

    public function forgot()
    {
        return view('pages.auth.forgot');
    }

    public function resetPassword($reset_code)
    {
        return view('pages.auth.reset', compact('reset_code'));
    }

    public function sendResetPasswordCode(Request $request)
    {
        $email = $request->input('email');

        $user = User::where('email', '=', $email)->first();
        if(is_null($user)){
            return back()->withInput()->withErrors(['message' => 'User Not Found']);
        }
        else
        {
            $reset_password_code = Str::random(20);
            $user->reset_password_code = $reset_password_code;
            $user->save();

            Mail::to($email)->send(new ResetPasswordCode($user));
            Session::flash('success', 'Reset password code telah dikirim ke email. Silahkan cek inbox email anda.');
            return view('pages.auth.forgot');
        }
    }

    public function setNewPassword(Request $request)
    {
        $reset_code = $request->input('reset_code');
        $user = User::where('reset_password_code', '=', $reset_code)->first();
        if(is_null($user))
        {
            return back()->withErrors(['message' => 'Your reset password code is wrong.']);
        }
        else{
            $user->password = bcrypt($request->password);
            $user->save();

            Auth::logout();
            
            Session::flash('success', 'Password successfully changed.');
            return redirect()->route('login');
        }
    }

    public function apiLogin(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
            'remember_me' => 'boolean'
        ]);
        $credentials = request(['email', 'password']);
        if(!Auth::attempt($credentials))
            return response()->json([
                'message' => 'Unauthorized'
            ], 401);
        $user = $request->user();
        $tokenResult = $user->createToken('Personal Access Token');
        $token = $tokenResult->token;
        if ($request->remember_me)
            $token->expires_at = Carbon::now()->addWeeks(1);
        $token->save();
        return response()->json([
            'access_token' => $tokenResult->accessToken,
            'token_type' => 'Bearer',
            'expires_at' => Carbon::parse(
                $tokenResult->token->expires_at
            )->toDateTimeString()
        ]);
    }

    public function apiLogout(Request $request)
    {
        $request->user()->token()->revoke();
        return response()->json([
            'message' => 'Successfully logged out'
        ]);
    }
}
