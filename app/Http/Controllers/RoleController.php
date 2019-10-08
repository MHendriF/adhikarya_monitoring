<?php

namespace App\Http\Controllers;

use Session;
use Mail;
use Auth;
use DB;
use DataTables;

use App\User;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Http\Requests\RoleRequest;

use Illuminate\Http\Request;

class RoleController extends Controller
{
    protected $submenu;

    function __construct()
    {
        $this->submenu = 'Role';
        view()->share('submenu', $this->submenu);
    }

    public function selectedPermission($role_id) {
      	$permissionOption = array();
      	$permissions = Permission::all();

        //$selectedPermission = PermissionRole::where('role_id', $role_id)->get();

        $selectedPermission = Permission::join("role_has_permissions","role_has_permissions.permission_id","=","permissions.id")
                              ->where("role_has_permissions.role_id",$role_id)
                              ->get();


      	foreach($permissions as $permission) {
      		$permissionOption[$permission->id] = array();
      		$permissionOption[$permission->id]['id'] = $permission->id;
      		$permissionOption[$permission->id]['name'] = $permission->name;
      		$permissionOption[$permission->id]['selected'] = "off";
      		foreach($selectedPermission as $sp) {
      			if($sp->permission_id == $permission->id) {
      				$permissionOption[$permission->id]['selected'] = "on";
      			}
      		}
      	}
      	return $permissionOption;
    }

    public function index()
    {
        if(Auth::user()) {
            return view('pages.configuration.role.index');
        }
        else {
            Session::flash('error401', 'Full authentication is required to access this resource');
            return back();
        }
    }

    public function getRole(Datatables $datatables)
    {
        if(Auth::user()) {
            return DataTables::eloquent(Role::query())
                              ->addIndexColumn()
                              ->addColumn('action', function($role){
                                    return
                                        '<a href="'. route('role.edit',$role->id) .'" data-toggle="tooltip" title="Edit" class="btn btn-success btn-sm btn-icon-anim btn-square mr-5" style="display: unset;"><i class="fa fa-pencil" style="font-size: 14px;"></i></a>'.
                                        '<a href="'. route('role.assign',$role->id) .'" data-toggle="tooltip" title="Assign Permission" class="btn btn-primary btn-sm btn-icon-anim btn-square mr-5" style="display: unset;"><i class="fa fa-wrench" style="font-size: 14px;"></i></a>'.
                                        '<a href="'. route('role.delete',$role->id) .'" id="delete" data-toggle="tooltip" title="Delete" class="btn btn-danger btn-sm btn-icon-anim btn-square mr-5" style="display: unset;"><i class="fa fa-trash" style="font-size: 14px;"></i></a>';
                                })
                              ->make(true);
        }
    }

    public function create()
    {
        if(Auth::user()) {
            return view('pages.configuration.role.create');
        }
        else {
            Session::flash('error401', 'Full authentication is required to access this resource');
            return back();
        }
    }

    public function store(RoleRequest $request)
    {
        if(Auth::user()) {

            Role::create(['guard_name' =>  $request->input('guard_name'),
                        'name' => $request->input('name')]);

            Session::flash('create', 'New role was successfully added');
            return redirect()->route('role.index');
        }
        else {
            Session::flash('error401', 'Full authentication is required to access this resource');
            return back();
        }
    }

    public function edit($id)
    {
        if(Auth::user()) {
            $role = Role::find($id);
            return view('pages.configuration.role.edit', compact('role'));
        }
        else {
            Session::flash('error401', 'Full authentication is required to access this resource');
            return back();
        }
    }

    public function assign($id)
    {
        if(Auth::user()) {
            $role = Role::find($id);
            $roles = Role::all();
            $selectedRole = $id;
            $permissionOption = $this->selectedPermission($id);
            return view('pages.configuration.role.assign', compact('roles', 'role', 'selectedRole', 'permissionOption'));
        }
        else {
            Session::flash('error401', 'Full authentication is required to access this resource');
            return back();
        }
    }

    public function update(Request $request, $id)
    {
        if(Auth::user()) {
            $role = Role::find($id);
            $role->update($request->all());
            Session::flash('update', 'Role was successfully updated');
            return redirect()->route('role.index');
        }
        else {
            Session::flash('error401', 'Full authentication is required to access this resource');
            return back();
        }
    }

    public function assignUpdate(Request $request, $id)
    {
        if(Auth::user()) {

            $permissionOption = $this->selectedPermission($id);
            $request = $request->toArray();
            $role = Role::find($id);

            //hanya mengupdate yg berubah
            foreach($permissionOption as $permission) {

                if($permission['selected'] == "on" and !isset($request[$permission['name']])) {
                    //ada yang baru dihilangkan centangnya
                    $role->revokePermissionTo($permission['name']);
                }
                elseif(isset($request[$permission['name']])) {
                    //ada yg baru dicentang
                    $role->givePermissionTo($permission['name']);
                }
            }
            Session::flash('update', 'Assign Role berhasil diperbaharui');
            return redirect()->route('role.index');
        }
        else {
            Session::flash('error401', 'Full authentication is required to access this resource');
            return back();
        }
    }

    public function destroy($id)
    {
        if(Auth::user()) {
            try {
                if(Role::where('id', '=', $id)->delete())
                {
                    Session::flash('delete', 'Role was successfully deleted!');
                    return redirect()->route('role.index');
                }
            } catch (\Exception $e) {
                Session::flash('error405', 'This method is not allowed');
                return back();
            }
        }
        else {
            Session::flash('error401', 'Full authentication is required to access this resource');
            return back();
        }
    }
}
