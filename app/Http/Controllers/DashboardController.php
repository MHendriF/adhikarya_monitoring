<?php

namespace App\Http\Controllers;

use Auth;
use Mail;
use Session;
use DB;
use DataTables;
use Input;

use Carbon\Carbon;

use App\User;
use App\Mail\Reminder;

use App\Models\Dokumen;
use App\Models\JenisDokumen;
use Spatie\Permission\Models\Role;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function getDashboard()
    {
        $documents = JenisDokumen::all();
        return view('pages.master.dashboard', compact('documents'));
    }

    public function sendReminder()
    {
        $user = User::find(1);
        Mail::to($user->email)->send(new Reminder($user));
        Session::flash('success', 'Reminder code telah dikirim ke email. Silahkan cek inbox email anda.');
        return view('pages.master.dashboard');
    }

    public function getDocument(Request $request, Datatables $datatables)
    {
        if(Auth::user()) {
            $model = $this->queryfilter($request);
            return DataTables::eloquent($model)
                              ->addIndexColumn()
                              ->addColumn('action', function($dokumen){
                                    return
                                        '<a href="'. route('engineering.edit',$dokumen->id_dokumen) .'" data-toggle="tooltip" title="Edit" class="btn btn-success btn-sm btn-icon-anim btn-square mr-5" style="display: unset;"><i class="fa fa-pencil" style="font-size: 14px;"></i></a>'.
                                        '<a href="'. route('engineering.delete',$dokumen->id_dokumen) .'" id="delete" data-toggle="tooltip" title="Delete" class="btn btn-danger btn-sm btn-icon-anim btn-square mr-5" style="display: unset;"><i class="fa fa-trash" style="font-size: 14px;"></i></a>';
                                })
                              ->make(true);
        }
    }

    protected function queryfilter(Request $request)
    {
        $jenis_dokumen_param = $request->input('jenis_dokumen');

        if (!empty($request->input('start_date'))) {
            $arrStart = explode("-", $request->input('start_date'));
            $start_date_param = Carbon::create($arrStart[0], $arrStart[1], $arrStart[2], 0, 0, 0);
        }else {
            $start_date_param = $request->input('start_date');
        }

        if (!empty($request->input('end_date'))) {
            $arrEnd = explode("-", $request->input('end_date'));
            $end_date_param = Carbon::create($arrEnd[0], $arrEnd[1], $arrEnd[2], 23, 59, 59);
        }else {
            $end_date_param = $request->input('end_date');
        }

        if ($jenis_dokumen_param == "all") {
            if (empty($start_date_param)) {
                if (empty($end_date_param)) {
                    $model = Dokumen::join('jenis_dokumen', 'dokumen.id_jenis_dokumen', '=', 'jenis_dokumen.id_jenis_dokumen')
                                      ->select('dokumen.*');
                }else {
                    $model = Dokumen::where('dokumen.tanggal_pengajuan', '<=', $end_date_param)
                                      ->join('jenis_dokumen', 'dokumen.id_jenis_dokumen', '=', 'jenis_dokumen.id_jenis_dokumen')
                                      ->select('dokumen.*');
                }
            }
            else {
                if (empty($end_date_param)) {
                    $model = Dokumen::where('dokumen.tanggal_pengajuan', '>=', $start_date_param)
                                      ->join('jenis_dokumen', 'dokumen.id_jenis_dokumen', '=', 'jenis_dokumen.id_jenis_dokumen')
                                      ->select('dokumen.*');
                }else {
                    $model = Dokumen::where('dokumen.tanggal_pengajuan', '>=', $start_date_param)
            				                  ->where('dokumen.tanggal_pengajuan', '<=', $end_date_param)
                                      ->join('jenis_dokumen', 'dokumen.id_jenis_dokumen', '=', 'jenis_dokumen.id_jenis_dokumen')
                                      ->select('dokumen.*');
                }
            }
        }else {
            if (empty($start_date_param)) {
                if (empty($end_date_param)) {
                    $model = Dokumen::where('dokumen.id_jenis_dokumen', $jenis_dokumen_param)
                                      ->join('jenis_dokumen', 'dokumen.id_jenis_dokumen', '=', 'jenis_dokumen.id_jenis_dokumen')
                                      ->select('dokumen.*');
                }else {
                    $model = Dokumen::where('dokumen.id_jenis_dokumen', $jenis_dokumen_param)
                                      ->where('dokumen.tanggal_pengajuan', '<=', $end_date_param)
                                      ->join('jenis_dokumen', 'dokumen.id_jenis_dokumen', '=', 'jenis_dokumen.id_jenis_dokumen')
                                      ->select('dokumen.*');
                }
            }
            else {
                if (empty($end_date_param)) {
                    $model = Dokumen::where('dokumen.id_jenis_dokumen', $jenis_dokumen_param)
                                      ->where('dokumen.tanggal_pengajuan', '>=', $start_date_param)
                                      ->join('jenis_dokumen', 'dokumen.id_jenis_dokumen', '=', 'jenis_dokumen.id_jenis_dokumen')
                                      ->select('dokumen.*');
                }else {
                    $model = Dokumen::where('dokumen.id_jenis_dokumen', $jenis_dokumen_param)
                                      ->where('dokumen.tanggal_pengajuan', '>=', $start_date_param)
                                      ->where('dokumen.tanggal_pengajuan', '<=', $end_date_param)
                                      ->join('jenis_dokumen', 'dokumen.id_jenis_dokumen', '=', 'jenis_dokumen.id_jenis_dokumen')
                                      ->select('dokumen.*');
                }
            }
        }

        return $model;
    }
}
