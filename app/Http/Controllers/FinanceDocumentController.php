<?php

namespace App\Http\Controllers;

use Session;
use Mail;
use Auth;
use DB;
use DataTables;

use App\User;
use App\Models\Dokumen;
use App\Models\JenisDokumen;
use App\Models\PicDokumen;
use App\Models\SchedulerEmail;
use Spatie\Permission\Models\Role;
use App\Http\Requests\DocumentRequest;

use Illuminate\Http\Request;

class FinanceDocumentController extends Controller
{
    protected $namadokumen = "FINANCE";
    protected $submenu;

    function __construct()
    {
        $this->submenu = 'Dokumen Finance';
        view()->share('submenu', $this->submenu);
    }

    public function index()
    {
        if(Auth::user()) {
            return view('pages.document.finance.index');
        }
        else {
            Session::flash('error401', 'Full authentication is required to access this resource');
            return back();
        }
    }

    public function getDocument(Datatables $datatables)
    {
        if(Auth::user()) {
            $model = $this->queryfilter();
            return DataTables::eloquent($model)
                              ->addIndexColumn()
                              ->addColumn('action', function($dokumen){
                                    return
                                        '<a href="'. route('finance.edit',$dokumen->id_dokumen) .'" data-toggle="tooltip" title="Edit" class="btn btn-success btn-sm btn-icon-anim btn-square mr-5" style="display: unset;"><i class="fa fa-pencil" style="font-size: 14px;"></i></a>'.
                                        '<a href="'. route('finance.delete',$dokumen->id_dokumen) .'" id="delete" data-toggle="tooltip" title="Delete" class="btn btn-danger btn-sm btn-icon-anim btn-square mr-5" style="display: unset;"><i class="fa fa-trash" style="font-size: 14px;"></i></a>';
                                })
                              ->make(true);
        }
    }

    public function create()
    {
        if(Auth::user()) {
            $listUser = User::pluck('nama_user', 'id_user')->all();
            return view('pages.document.finance.create', compact('listUser'));
        }
        else {
            Session::flash('error401', 'Full authentication is required to access this resource');
            return back();
        }
    }

    public function store(DocumentRequest $request)
    {
        if(Auth::user()) {
            $jenisdokumen = JenisDokumen::where('nama_jenis_dokumen', $this->namadokumen)->first();

            $codeBase = $jenisdokumen->kode_jenis_dokumen;
            $count = DB::table('dokumen')->count();
            $nextDigit = $count + 1;
            $unitBase = str_pad($nextDigit, 7, '0', STR_PAD_LEFT);
            $code_document = $codeBase.$unitBase;

            $dokumen = new Dokumen(array(
                'kode_dokumen'     => $code_document,
                'nama_dokumen'     => $request->input('nama_dokumen'),
                'status_dokumen'    => $request->input('status_dokumen'),
                'keterangan_dokumen'    => $request->input('keterangan_dokumen'),
                'id_jenis_dokumen'    => $jenisdokumen->id_jenis_dokumen,

                'deadline_dokumen'    => $request->input('deadline_dokumen'),
                'tanggal_pengajuan'    => $request->input('tanggal_pengajuan'),
                'tanggal_diterima_mk'    => $request->input('tanggal_diterima_mk'),
                'tanggal_diapprove_mk'    => $request->input('tanggal_diapprove_mk'),
                'tanggal_diapprove_owner'    => $request->input('tanggal_diapprove_owner'),
                'tanggal_diterima_adhikarya'    => $request->input('tanggal_diterima_adhikarya'),
            ));
            $dokumen->save();

            $pic_dokumen = $this->savePicDocument($dokumen, $request);

            if (!empty($request->input('deadline_dokumen'))) {
                $this->saveSchedulerEmail($dokumen, $pic_dokumen, $request);
            }

            Session::flash('create', 'New document was successfully added');
            return redirect()->route('finance.index');
        }
        else {
            Session::flash('error401', 'Full authentication is required to access this resource');
            return back();
        }

    }

    public function edit($id)
    {
        if(Auth::user()) {
            $dokumen = Dokumen::find($id);
            $listUser = User::pluck('nama_user', 'id_user')->all();
            $picDokumen = PicDokumen::where('id_dokumen', $dokumen->id_dokumen)->first();
            return view('pages.document.finance.edit', compact('dokumen', 'listUser', 'picDokumen'));
        }
        else {
            Session::flash('error401', 'Full authentication is required to access this resource');
            return back();
        }

    }

    public function update(DocumentRequest $request, $id)
    {
        if(Auth::user()) {
            $dokumen = Dokumen::find($id);
            $dokumen->update($request->all());

            //Update PIC Dokumen
            $pic_dokumen = $this->updatePicDocument($dokumen, $request);

            //Update SchedulerEmail
            $scheduler = SchedulerEmail::where('id_pic_dokumen', '=', $pic_dokumen->id_pic_dokumen)->first();

            if ($scheduler === null) { //if doesnt exist
                if (!empty($request->input('deadline_dokumen'))) {
                    $this->saveSchedulerEmail($dokumen, $pic_dokumen, $request);
                }
            }
            else{ //if exist
                if($scheduler->schedule_time != $request->input('deadline_dokumen')){
                    $this->updateSchedulerEmail($dokumen, $pic_dokumen, $request);
                }
            }

            Session::flash('update', 'Document was successfully updated');
            return redirect()->route('finance.index');
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
                if(Dokumen::where('id_dokumen', '=', $id)->delete())
                {
                    Session::flash('delete', 'Document was successfully deleted!');
                    return redirect()->route('finance.index');
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

    protected function queryfilter()
    {
        $model = Dokumen::join('jenis_dokumen', 'dokumen.id_jenis_dokumen', '=', 'jenis_dokumen.id_jenis_dokumen')
                          ->where('jenis_dokumen.nama_jenis_dokumen', '=', $this->namadokumen)
                          ->select('dokumen.*');
        return $model;
    }

    protected function savePicDocument(Dokumen $dokumen, Request $request)
    {
        $pic_dokumen = new PicDokumen(array(
          'id_user'     => $request->input('id_user'),
          'id_dokumen'     => $dokumen->id_dokumen,
        ));
        $pic_dokumen->save();
        return $pic_dokumen;
    }

    protected function saveSchedulerEmail(Dokumen $dokumen, PicDokumen $pic_dokumen, Request $request)
    {
        $scheduler = new SchedulerEmail(array(
          'id_pic_dokumen'     => $pic_dokumen->id_pic_dokumen,
          'schedule_time' => $dokumen->deadline_dokumen,
          'status_scheduler' => "",
        ));
        $scheduler->save();
    }

    protected function updatePicDocument(Dokumen $dokumen, Request $request)
    {
        $pic_dokumen = PicDokumen::where('id_dokumen', $dokumen->id_dokumen)->first();
        $pic_dokumen->id_dokumen = $dokumen->id_dokumen;
        $pic_dokumen->id_user = $request->input('id_user');
        $pic_dokumen->save();
        return $pic_dokumen;
    }

    protected function updateSchedulerEmail(Dokumen $dokumen, PicDokumen $pic_dokumen, Request $request)
    {
        $scheduler = SchedulerEmail::where('id_pic_dokumen', $pic_dokumen->id_pic_dokumen)->first();
        $scheduler->id_pic_dokumen = $scheduler->id_pic_dokumen;
        $scheduler->schedule_time = $dokumen->deadline_dokumen;
        $scheduler->status_scheduler = "update scheduler";
        $scheduler->save();
    }
}
