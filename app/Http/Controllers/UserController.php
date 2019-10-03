<?php

namespace App\Http\Controllers;

use Session;
use Mail;
use Auth;
use DB;
use Input;
use DataTables;

use App\User;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{

   public function index()
   {
       if(Auth::user()->hasPermissionTo('dashboard')) {
           return view('pages.master.user.index');
       }
       else {
           Session::flash('error401', 'Full authentication is required to access this resource');
           return back();
       }
   }

   public function getUser(Datatables $datatables)
   {
       //$model = User::with('jabatan')->with('divisi')->with('approval')->select('user.*');
       $model = $this->queryfilter();
       return Datatables::eloquent($model)
                         ->addIndexColumn()
                         ->addColumn('action', function(User $user){
                               return
                                   '<a href="'. route('user.edit',$user->id_user) .'" data-toggle="tooltip" title="Edit" class="btn btn-success btn-sm btn-icon-anim btn-square mr-5" style="display: unset;"><i class="fa fa-pencil" style="font-size: 14px;"></i></a>'.
                                   '<a href="'. route('user.resetpassword',$user->id_user) .'" id="reset" data-toggle="tooltip" title="Reset Password" class="btn btn-warning btn-sm btn-icon-anim btn-square mr-5" style="display: unset;"><i class="fa fa-question" style="font-size: 14px;"></i></a>'.
                                   '<a href="'. route('user.delete',$user->id_user) .'" id="delete" data-toggle="tooltip" title="Delete" class="btn btn-danger btn-sm btn-icon-anim btn-square mr-5" style="display: unset;"><i class="fa fa-trash" style="font-size: 14px;"></i></a>';
                           })
                         ->make(true);


   }

   public function editpassword($id)
    {
        $user = User::find($id);
        return view('pages.master.user.editpassword', compact('tablename', 'user'));
    }

    public function updatepassword(Request $request, $id)
    {
        $user = User::find($id);
        $user->password = bcrypt($request->password);
        $user->save();

        Auth::logout();
        return redirect()->route('login')->withErrors(['message' => 'Password berhasil diganti.']);
    }

    public function resetpassword($id)
    {
        if(Auth::user()->hasRole('Admin')) {
            $user = User::find($id);

            $reset_password_code = str_random(20);
            $user->reset_password_code = $reset_password_code;
            $user->save();

            Mail::to($user->email)->send(new ResetPasswordCode($user));
            Session::flash('success', 'Reset password code telah dikirim ke email. Silahkan cek inbox email anda.');
            return redirect()->route('user.index');

        }
        else {
            Session::flash('error401', 'Full authentication is required to access this resource');
            return back();
        }
    }

    protected function queryfilter()
    {
        $model = User::join('jabatan', 'user.id_jabatan', '=', 'jabatan.id_jabatan')
                      ->join('divisi', 'user.id_divisi', '=', 'divisi.id_divisi')
                      ->join('lembaga', 'user.id_lembaga', '=', 'lembaga.id_lembaga')
                      ->select('jabatan.nama_jabatan', 'divisi.nama_divisi', 'lembaga.nama_lembaga', 'user.*');

        return $model;
    }

}
