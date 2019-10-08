<?php

namespace App\Http\Controllers;

use Session;
use Mail;
use Auth;
use DB;
use DataTables;

use App\User;

use App\Models\Divisi;
use App\Models\Jabatan;
use App\Models\Lembaga;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    protected $submenu;

    function __construct()
    {
        $this->submenu = 'User';
        view()->share('submenu', $this->submenu);
    }

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

    public function create()
    {
       if(Auth::user()){
           $listDivisi = Divisi::pluck('nama_divisi', 'id_divisi')->all();
           $listJabatan = Jabatan::pluck('nama_jabatan', 'id_jabatan')->all();
           $listLembaga = Lembaga::pluck('nama_lembaga', 'id_lembaga')->all();
           $listRole = Role::pluck('name', 'name')->all();

           return view('pages.master.user.create', compact('listDivisi', 'listJabatan', 'listLembaga', 'listRole'));

       }else {
           Session::flash('error401', 'Full authentication is required to access this resource');
           return back();
       }
    }

    public function store(UserRequest $request)
    {
       if(Auth::user()){
           $data = $request->toArray();
           $user = $this->register($data);

           $user->assignRole($data['nama_role']);

           Session::flash('create', 'New User was successfully added');
           return redirect()->route('user.index');
       }else {
           Session::flash('error401', 'Full authentication is required to access this resource');
           return back();
       }

    }

    public function edit($id)
    {
       if(Auth::user()) {
           $user = User::find($id);
           $listDivisi = Divisi::pluck('nama_divisi', 'id_divisi')->all();
           $listJabatan = Jabatan::pluck('nama_jabatan', 'id_jabatan')->all();
           $listLembaga = Lembaga::pluck('nama_lembaga', 'id_lembaga')->all();
           $listRole = Role::pluck('name', 'name')->all();

           $userRole = $user->roles->pluck('name','name')->all();
           return view('pages.master.user.edit', compact('user', 'listDivisi', 'listLembaga', 'listJabatan', 'listRole', 'userRole'));
       }else {
           Session::flash('error401', 'Full authentication is required to access this resource');
           return back();
       }
    }

    public function update(Request $request, $id)
    {
       if(Auth::user()){
           $user = User::find($id);
           $emailAddress = User::where('email', $request->input('email'))->count();
           if($user->email != $request->input('email')) {
               if($emailAddress > 0) {
                   return back()->with('error', 'Email already exists.')->withInput(Input::all());
               }
           }

           $user->username = $request->input('username');
           $user->nama_user = $request->input('nama_user');
           $user->email = $request->input('email');

           $user->id_lembaga = $request->input('id_lembaga');
           $user->id_jabatan = $request->input('id_jabatan');
           $user->id_divisi = $request->input('id_divisi');
           $user->nohp = $request->input('nohp');
           $user->save();

           $currentRoles = $user->getRoleNames();
           foreach ($currentRoles as $role) {
              $user->removeRole($role);
           }

           $user->assignRole($request->input('nama_role'));

           Session::flash('update', 'User was successfully updated');
           return redirect()->route('user.index');
       }else {
           Session::flash('error401', 'Full authentication is required to access this resource');
           return back();
       }
    }

    protected function register(array $data) {
        return User::create([
            'nama_user' => $data['nama_user'],
            'username' => $data['username'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'nohp' => $data['nohp'],
            'id_divisi' => $data['id_divisi'],
            'id_lembaga' => $data['id_lembaga'],
            'id_jabatan' => $data['id_jabatan'],
        ]);
    }

}
