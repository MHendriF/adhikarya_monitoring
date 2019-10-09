<?php

namespace App\Traits;

use Auth;
use Mail;
use Session;
use DB;
use DataTables;

use Carbon\Carbon;

use App\User;
use App\Mail\Reminder;

use App\Models\Dokumen;
use App\Models\JenisDokumen;
use Spatie\Permission\Models\Role;

use Illuminate\Http\Request;

trait DokumenTrait
{
    public function getDocumentTrait(Request $request)
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
                    $models = Dokumen::join('jenis_dokumen', 'dokumen.id_jenis_dokumen', '=', 'jenis_dokumen.id_jenis_dokumen')
                                      ->select('dokumen.*')
                                      ->get();
                }else {
                    $models = Dokumen::where('dokumen.tanggal_pengajuan', '<=', $end_date_param)
                                      ->join('jenis_dokumen', 'dokumen.id_jenis_dokumen', '=', 'jenis_dokumen.id_jenis_dokumen')
                                      ->select('dokumen.*')
                                      ->get();
                }
            }
            else {
                if (empty($end_date_param)) {
                    $models = Dokumen::where('dokumen.tanggal_pengajuan', '>=', $start_date_param)
                                      ->join('jenis_dokumen', 'dokumen.id_jenis_dokumen', '=', 'jenis_dokumen.id_jenis_dokumen')
                                      ->select('dokumen.*')
                                      ->get();
                }else {
                    $models = Dokumen::where('dokumen.tanggal_pengajuan', '>=', $start_date_param)
            				                  ->where('dokumen.tanggal_pengajuan', '<=', $end_date_param)
                                      ->join('jenis_dokumen', 'dokumen.id_jenis_dokumen', '=', 'jenis_dokumen.id_jenis_dokumen')
                                      ->select('dokumen.*')
                                      ->get();
                }
            }
        }else {
            if (empty($start_date_param)) {
                if (empty($end_date_param)) {
                    $models = Dokumen::where('dokumen.id_jenis_dokumen', $jenis_dokumen_param)
                                      ->join('jenis_dokumen', 'dokumen.id_jenis_dokumen', '=', 'jenis_dokumen.id_jenis_dokumen')
                                      ->select('dokumen.*')
                                      ->get();
                }else {
                    $models = Dokumen::where('dokumen.id_jenis_dokumen', $jenis_dokumen_param)
                                      ->where('dokumen.tanggal_pengajuan', '<=', $end_date_param)
                                      ->join('jenis_dokumen', 'dokumen.id_jenis_dokumen', '=', 'jenis_dokumen.id_jenis_dokumen')
                                      ->select('dokumen.*')
                                      ->get();
                }
            }
            else {
                if (empty($end_date_param)) {
                    $models = Dokumen::where('dokumen.id_jenis_dokumen', $jenis_dokumen_param)
                                      ->where('dokumen.tanggal_pengajuan', '>=', $start_date_param)
                                      ->join('jenis_dokumen', 'dokumen.id_jenis_dokumen', '=', 'jenis_dokumen.id_jenis_dokumen')
                                      ->select('dokumen.*')
                                      ->get();
                }else {
                    $models = Dokumen::where('dokumen.id_jenis_dokumen', $jenis_dokumen_param)
                                      ->where('dokumen.tanggal_pengajuan', '>=', $start_date_param)
                                      ->where('dokumen.tanggal_pengajuan', '<=', $end_date_param)
                                      ->join('jenis_dokumen', 'dokumen.id_jenis_dokumen', '=', 'jenis_dokumen.id_jenis_dokumen')
                                      ->select('dokumen.*')
                                      ->get();
                }
            }
        }

        $dokumen = array();

        if(isset($models)) {
            foreach($models as $model) {
                $index = date("YmdHis", strtotime($model->created_at));
                $dokumen[$index] = array();
                $dokumen[$index]['id_dokumen'] = $model->id_dokumen;
                $dokumen[$index]['kode_dokumen'] = $model->kode_dokumen;
                $dokumen[$index]['nama_dokumen'] = $model->nama_dokumen;
                $dokumen[$index]['status_dokumen'] = $model->status_dokumen;
                $dokumen[$index]['keterangan_dokumen'] = $model->keterangan_dokumen;
                $dokumen[$index]['deadline_dokumen'] = $model->deadline_dokumen;
                $dokumen[$index]['tanggal_pengajuan'] = $model->tanggal_pengajuan;
                $dokumen[$index]['tanggal_diterima_mk'] = $model->tanggal_diterima_mk;
                $dokumen[$index]['tanggal_diapprove_mk'] = $model->tanggal_diapprove_mk;
                $dokumen[$index]['tanggal_diapprove_owner'] = $model->tanggal_diapprove_owner;
                $dokumen[$index]['tanggal_diterima_adhikarya'] = $model->tanggal_diterima_adhikarya;

                if ($model->jenisdokumen->nama_jenis_dokumen != "HSE / K3L") {
                    $tipe_dokumen = strtolower($model->jenisdokumen->nama_jenis_dokumen);
                }else{
                    $tipe_dokumen = strtolower("HSE");
                }

                $dokumen[$index]['tipe_dokumen'] = $tipe_dokumen;
            }
        }

        return $dokumen;

    }
}
