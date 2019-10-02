<?php

namespace App\Http\Controllers\Authenticate;


// PT. Trikarya Teknologi Indonesia
// Tenggilis raya 127
// Office Complex Apartment Metropolis MKB 206
// Surabaya, Jawa timur, Indonesia
// Phone : +6231-8420384 / +6281235537717
// www.trikaryateknologi.com

// #Coder:
// Greg Debian, Tosca Yoel, Hendry Febriansyah// 

use App\User;
use Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use App\Models\Jabatan;
use App\Models\Divisi;
use App\Models\Area;
use App\Role;
use App\Models\RoleUser;
use App\Models\Approval;
use App\Models\Group;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'nama' => 'required|string|max:255',
            'username' => 'required|string|min:6',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'nik' => 'required|string|min:6',
            'id_divisi' => 'required',
            'id_area' => 'required',
            'id_jabatan' => 'required',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'nama' => $data['nama'],
            'username' => $data['username'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'nik' => $data['nik'],
            'id_divisi' => $data['id_divisi'],
            'id_area' => $data['id_area'],
            'id_jabatan' => $data['id_jabatan'],
        ]);
    }

    protected function register() {
        $jabatan = Jabatan::all();
        $divisi = Divisi::all();
        $area = Area::all();
        return view('auth.register', compact('jabatan', 'divisi', 'area'));
    }

    protected function postRegister(Request $request) {
        if(Auth::user()->hasRole('admin')) {
            $data = $request->toArray();
            $this->validator($data);
            $user = $this->create($data);
            $this->addGroup($data, $user['id_user']);
            $this->addRoleUser($data, $user['id_user']);

            return redirect('/master/user');
        }
        else {
            return redirect('/home');
        }
    }

    protected function addRoleUser(array $data, $id_user) {
        $listIdGroup = $data['id_group'];

        //preprocessing
        $allRole = Role::where('id', '!=', '1')->get();
        $arrayRole = array();
        foreach($allRole as $a) {
            $arrayRole[$a->name] = $a->id;
        }

        $listGroup = Group::whereIn('id_group', $listIdGroup)->get();
        
        if( isset($data['check_stp']) ) {
            foreach($listGroup as $group) {
                $roleUser = new RoleUser;
                $namaRole = strtolower($group->nama_group)."_stp";
                $roleUser->user_id = $id_user;
                $roleUser->role_id = $arrayRole[$namaRole];
                $roleUser->save();
            }
        }
        if( isset($data['check_std']) ) {
            foreach($listGroup as $group) {
                $roleUser = new RoleUser;
                $namaRole = strtolower($group->nama_group)."_std";
                $roleUser->user_id = $id_user;
                $roleUser->role_id = $arrayRole[$namaRole];
                $roleUser->save();
            }
        }
        if( isset($data['check_ta']) ) {
            foreach($listGroup as $group) {
                $roleUser = new RoleUser;
                $namaRole = strtolower($group->nama_group)."_ta";
                $roleUser->user_id = $id_user;
                $roleUser->role_id = $arrayRole[$namaRole];
                $roleUser->save();
            }
        }
        if( isset($data['check_pv']) ) {
            foreach($listGroup as $group) {
                $roleUser = new RoleUser;
                $namaRole = strtolower($group->nama_group)."_pv";
                $roleUser->user_id = $id_user;
                $roleUser->role_id = $arrayRole[$namaRole];
                $roleUser->save();
            }
        }
    }

    protected function addGroup(array $data, $id_user) {
        $arrayGroup = $data['id_group'];

        foreach($arrayGroup as $group) {
            $newUserGroup = new Approval;
            $newUserGroup->id_user = $id_user;
            $newUserGroup->id_group = $group;
            $newUserGroup->save();
        }
    }
}
