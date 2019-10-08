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

class PermissionController extends Controller
{
    protected $submenu;

    function __construct()
    {
        $this->submenu = 'Permission';
        view()->share('submenu', $this->submenu);
    }

    public function index()
    {
        if(Auth::user()) {
            return view('pages.configuration.permission.index');
        }
        else {
            Session::flash('error401', 'Full authentication is required to access this resource');
            return back();
        }
    }

    public function getPermission(Datatables $datatables)
    {
        if(Auth::user()) {
            return DataTables::eloquent(Permission::query())
                              ->addIndexColumn()
                              ->addColumn('action', function($permission){
                                    return
                                        '<a href="'. route('permission.edit',$permission->id) .'" data-toggle="tooltip" title="Edit" class="btn btn-success btn-sm btn-icon-anim btn-square mr-5" style="display: unset;"><i class="fa fa-pencil" style="font-size: 14px;"></i></a>'.
                                        '<a href="'. route('permission.delete',$permission->id) .'" id="delete" data-toggle="tooltip" title="Delete" class="btn btn-danger btn-sm btn-icon-anim btn-square mr-5" style="display: unset;"><i class="fa fa-trash" style="font-size: 14px;"></i></a>';
                                })
                              ->make(true);
        }
    }

    public function create()
    {
        if(Auth::user()) {
            return view('pages.configuration.permission.create');
        }
        else {
            Session::flash('error401', 'Full authentication is required to access this resource');
            return back();
        }
    }

    public function store(PermissionRequest $request)
    {
        if(Auth::user()) {
            Permission::create($request->all());
            Session::flash('create', 'New permission was successfully added');
            return redirect()->route('permission.index');
        }
        else {
            Session::flash('error401', 'Full authentication is required to access this resource');
            return back();
        }
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        if(Auth::user()) {
            $permission = Permission::find($id);
            return view('pages.configuration.permission.edit', compact('permission'));
        }
        else {
            Session::flash('error401', 'Full authentication is required to access this resource');
            return back();
        }
    }

    public function update(Request $request, $id)
    {
        if(Auth::user()) {
            $permission = Permission::find($id);
            $permission->update($request->all());
            Session::flash('update', 'Permission was successfully updated');
            return redirect()->route('permission.index');
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
                if(Permission::where('id', '=', $id)->delete())
                {
                    Session::flash('delete', 'Permission was successfully deleted!');
                    return redirect()->route('permission.index');
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
