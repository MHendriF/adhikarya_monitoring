<?php

namespace App\Http\Controllers;

use Session;
use Mail;
use Auth;
use DB;
use DataTables;
use Storage;
use File;

use App\User;
use App\Models\Dokumen;
use App\Models\JenisDokumen;
use App\Models\PicDokumen;
use App\Models\SchedulerEmail;
use App\Models\LampiranSekretariat;
use Spatie\Permission\Models\Role;
use App\Http\Requests\DocumentRequest;

use Carbon\Carbon;

use Illuminate\Http\Request;

class SekretariatDocumentController extends Controller
{
    protected $namadokumen = "SEKRETARIAT";
    protected $submenu;
    protected $today;

    function __construct()
    {
        $this->submenu = 'Dokumen Sekretariat';
        view()->share('submenu', $this->submenu);
        $this->today =  Carbon::now();
        view()->share('today', $this->today);
    }

    public function index()
    {
        if(Auth::user()) {
            return view('pages.document.sekretariat.index');
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
                                        '<a href="'. route('sekretariat.edit',$dokumen->id_dokumen) .'" data-toggle="tooltip" title="Edit" class="btn btn-success btn-sm btn-icon-anim btn-square mr-5" style="display: unset;"><i class="fa fa-pencil" style="font-size: 14px;"></i></a>'.
                                        '<a href="'. route('sekretariat.show',$dokumen->id_dokumen) .'" data-toggle="tooltip" title="Detail" class="btn btn-primary btn-sm btn-icon-anim btn-square mr-5" style="display: unset;"><i class="fa fa-eye" style="font-size: 14px;"></i></a>'.
                                        '<a href="'. route('sekretariat.delete',$dokumen->id_dokumen) .'" id="delete" data-toggle="tooltip" title="Delete" class="btn btn-danger btn-sm btn-icon-anim btn-square mr-5" style="display: unset;"><i class="fa fa-trash" style="font-size: 14px;"></i></a>';
                                })
                              ->make(true);
        }
    }

    public function create()
    {
        if(Auth::user()) {
            $listUser = User::pluck('nama_user', 'id_user')->all();
            return view('pages.document.sekretariat.create', compact('listUser'));
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

            $files = $request->file('lampiran');
            if(!empty($files)):
                foreach ($files as $file):
                    $fileName = $code_document.'-'.date('YmdHis').'-'.$file->getClientOriginalName();
                    Storage::disk('dokumen_sekretariat')->put($fileName, file_get_contents($file));

                    $data = array('id_dokumen' => $dokumen->id_dokumen,
                                'nama_file' => $fileName,
                                'path' => 'dokumen\sekretariat',
                                'created_at' => $this->today,
                                'updated_at' => $this->today);
                    LampiranSekretariat::insert($data);
                endforeach;
            endif;

            Session::flash('create', 'New document was successfully added');
            return redirect()->route('sekretariat.index');
        }
        else {
            Session::flash('error401', 'Full authentication is required to access this resource');
            return back();
        }

    }

    public function show($id)
    {
        if(Auth::user()){
          $dokumen = Dokumen::find($id);
          $picDokumen = PicDokumen::where('id_dokumen', $dokumen->id_dokumen)->first();
          $attachments = $dokumen->lampiran_sekretariat;
          return view('pages.document.sekretariat.detail', compact('dokumen', 'picDokumen', 'attachments'));
        }else {
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
            return view('pages.document.sekretariat.edit', compact('dokumen', 'listUser', 'picDokumen'));
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
            return redirect()->route('sekretariat.index');
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
                    $pic_dokumen = PicDokumen::where('id_dokumen', '=', $id)->firstOrFail()->delete();
                    SchedulerEmail::where('id_pic_dokumen', $pic_dokumen->id_pic_dokumen)->firstOrFail()->delete();

                    $lampiran = LampiranSekretariat::where('id_dokumen', $id)->get();
                    foreach($lampiran as $fileLampiran) {
                        $filePath = 'dokumen\sekretariat\\'.$fileLampiran->nama_file;
                        if(File::exists($filePath)) {
                            File::delete($filePath);
                        }
                        $fileLampiran->delete();
                    }

                    Session::flash('delete', 'Document was successfully deleted!');
                    return redirect()->route('sekretariat.index');
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

    public function downloadFile($id)
    {
        $file = LampiranSekretariat::find($id);
        $filePath = 'dokumen/'.'sekretariat'.'/'.$file->nama_file;
        return Response::download($filePath);
    }
}
