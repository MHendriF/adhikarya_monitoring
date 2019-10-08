<?php

namespace App\Http\Controllers;

use Session;
use Mail;
use Auth;
use DB;
use DataTables;

use App\Models\Lembaga;
use Spatie\Permission\Models\Role;
use App\Http\Requests\LembagaRequest;

use Illuminate\Http\Request;

class LembagaController extends Controller
{

    protected $submenu;

    function __construct()
    {
        $this->submenu = 'Lembaga';
        view()->share('submenu', $this->submenu);
    }

    public function index()
    {
        if(Auth::user()) {
            return view('pages.master.lembaga.index');
        }
        else {
            Session::flash('error401', 'Full authentication is required to access this resource');
            return back();
        }
    }

    public function getLembaga(Datatables $datatables)
    {
        if(Auth::user()) {
            return DataTables::eloquent(Lembaga::query())
                              ->addIndexColumn()
                              ->addColumn('action', function($lembaga){
                                    return
                                        '<a href="'. route('lembaga.edit',$lembaga->id_lembaga) .'" data-toggle="tooltip" title="Edit" class="btn btn-success btn-sm btn-icon-anim btn-square mr-5" style="display: unset;"><i class="fa fa-pencil" style="font-size: 14px;"></i></a>'.
                                        '<a href="'. route('lembaga.delete',$lembaga->id_lembaga) .'" id="delete" data-toggle="tooltip" title="Delete" class="btn btn-danger btn-sm btn-icon-anim btn-square mr-5" style="display: unset;"><i class="fa fa-trash" style="font-size: 14px;"></i></a>';
                                })
                              ->make(true);
        }
    }

    public function create()
    {
        if(Auth::user()) {
            return view('pages.master.lembaga.create');
        }
        else {
            Session::flash('error401', 'Full authentication is required to access this resource');
            return back();
        }
    }

    public function store(LembagaRequest $request)
    {
        if(Auth::user()) {
            Lembaga::create($request->all());
            Session::flash('create', 'New divisi was successfully added');
            return redirect()->route('lembaga.index');
        }
        else {
            Session::flash('error401', 'Full authentication is required to access this resource');
            return back();
        }

    }

    public function edit($id)
    {
        if(Auth::user()) {
            $lembaga = Lembaga::find($id);
            return view('pages.master.lembaga.edit', compact('lembaga'));
        }
        else {
            Session::flash('error401', 'Full authentication is required to access this resource');
            return back();
        }

    }

    public function update(LembagaRequest $request, $id)
    {
        if(Auth::user()) {
            $lembaga = Lembaga::find($id);
            $lembaga->update($request->all());
            Session::flash('update', 'Lembaga was successfully updated');
            return redirect()->route('lembaga.index');
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
                if(Lembaga::where('id_lembaga', '=', $id)->delete())
                {
                    Session::flash('delete', 'Lembaga was successfully deleted!');
                    return redirect()->route('lembaga.index');
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
