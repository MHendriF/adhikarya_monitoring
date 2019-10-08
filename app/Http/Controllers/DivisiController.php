<?php

namespace App\Http\Controllers;

use Session;
use Mail;
use Auth;
use DB;
use DataTables;

use App\Models\Divisi;
use Spatie\Permission\Models\Role;
use App\Http\Requests\DivisiRequest;

use Illuminate\Http\Request;

class DivisiController extends Controller
{
    protected $submenu;

    function __construct()
    {
        $this->submenu = 'Divisi';
        view()->share('submenu', $this->submenu);
    }

    public function index()
    {
        if(Auth::user()) {
            return view('pages.master.divisi.index');
        }
        else {
            Session::flash('error401', 'Full authentication is required to access this resource');
            return back();
        }
    }

    public function getDivisi(Datatables $datatables)
    {
        if(Auth::user()) {
            return DataTables::eloquent(Divisi::query())
                              ->addIndexColumn()
                              ->addColumn('action', function($divisi){
                                    return
                                        '<a href="'. route('divisi.edit',$divisi->id_divisi) .'" data-toggle="tooltip" title="Edit" class="btn btn-success btn-sm btn-icon-anim btn-square mr-5" style="display: unset;"><i class="fa fa-pencil" style="font-size: 14px;"></i></a>'.
                                        '<a href="'. route('divisi.delete',$divisi->id_divisi) .'" id="delete" data-toggle="tooltip" title="Delete" class="btn btn-danger btn-sm btn-icon-anim btn-square mr-5" style="display: unset;"><i class="fa fa-trash" style="font-size: 14px;"></i></a>';
                                })
                              ->make(true);
        }
    }

    public function create()
    {
        if(Auth::user()) {
            return view('pages.master.divisi.create');
        }
        else {
            Session::flash('error401', 'Full authentication is required to access this resource');
            return back();
        }
    }

    public function store(DivisiRequest $request)
    {
        if(Auth::user()) {
            Divisi::create($request->all());
            Session::flash('create', 'New divisi was successfully added');
            return redirect()->route('divisi.index');
        }
        else {
            Session::flash('error401', 'Full authentication is required to access this resource');
            return back();
        }

    }

    public function edit($id)
    {
        if(Auth::user()) {
            $divisi = Divisi::find($id);
            return view('pages.master.divisi.edit', compact('divisi'));
        }
        else {
            Session::flash('error401', 'Full authentication is required to access this resource');
            return back();
        }

    }

    public function update(DivisiRequest $request, $id)
    {
        if(Auth::user()) {
            $divisi = Divisi::find($id);
            $divisi->update($request->all());
            Session::flash('update', 'Devisi was successfully updated');
            return redirect()->route('divisi.index');
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
                if(Divisi::where('id_divisi', '=', $id)->delete())
                {
                    Session::flash('delete', 'Divisi was successfully deleted!');
                    return redirect()->route('divisi.index');
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
