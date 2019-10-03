<?php

namespace App\Http\Controllers;

use Session;
use Mail;
use Auth;
use DB;
use DataTables;

use App\Models\Jabatan;
use Spatie\Permission\Models\Role;
use App\Http\Requests\JabatanRequest;

use Illuminate\Http\Request;

class JabatanController extends Controller
{
    public function index()
    {
        if(Auth::user()) {
            return view('pages.master.jabatan.index');
        }
        else {
            Session::flash('error401', 'Full authentication is required to access this resource');
            return back();
        }
    }

    public function getJabatan(Datatables $datatables)
    {
        if(Auth::user()) {
            return Datatables::eloquent(Jabatan::query())
                              ->addIndexColumn()
                              ->addColumn('action', function($jabatan){
                                    return
                                        '<a href="'. route('jabatan.edit',$jabatan->id_jabatan) .'" data-toggle="tooltip" title="Edit" class="btn btn-success btn-sm btn-icon-anim btn-square mr-5" style="display: unset;"><i class="fa fa-pencil" style="font-size: 14px;"></i></a>'.
                                        '<a href="'. route('jabatan.delete',$jabatan->id_jabatan) .'" id="delete" data-toggle="tooltip" title="Delete" class="btn btn-danger btn-sm btn-icon-anim btn-square mr-5" style="display: unset;"><i class="fa fa-trash" style="font-size: 14px;"></i></a>';
                                })
                              ->make(true);
        }
    }

    public function create()
    {
        if(Auth::user()) {
            return view('pages.master.jabatan.create');
        }
        else {
            Session::flash('error401', 'Full authentication is required to access this resource');
            return back();
        }
    }

    public function store(JabatanRequest $request)
    {
        if(Auth::user()) {
            Jabatan::create($request->all());
            Session::flash('create', 'New jabatan was successfully added');
            return redirect()->route('jabatan.index');
        }
        else {
            Session::flash('error401', 'Full authentication is required to access this resource');
            return back();
        }

    }

    public function edit($id)
    {
        if(Auth::user()) {
            $jabatan = Jabatan::find($id);
            return view('pages.master.jabatan.edit', compact('jabatan'));
        }
        else {
            Session::flash('error401', 'Full authentication is required to access this resource');
            return back();
        }
    }

    public function update(JabatanRequest $request, $id)
    {
        if(Auth::user()) {
            $jabatan = Jabatan::find($id);
            $jabatan->update($request->all());
            Session::flash('update', 'Jabatan was successfully updated');
            return redirect()->route('jabatan.index');
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
                if(Jabatan::where('id_jabatan', '=', $id)->delete())
                {
                    Session::flash('delete', 'Jabatan was successfully deleted!');
                    return redirect()->route('jabatan.index');
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
