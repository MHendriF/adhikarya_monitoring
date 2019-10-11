<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dokumen extends Model
{
    protected $table = 'dokumen';

    protected $primaryKey = 'id_dokumen';

    public $incrementing = true;

    public $timestamps = true;

    protected $fillable = [
      'kode_dokumen', 'nama_dokumen', 'status_dokumen', 'keterangan_dokumen', 'deadline_dokumen', 'id_jenis_dokumen',
      'tanggal_pengajuan', 'tanggal_diterima_mk', 'tanggal_diapprove_mk', 'tanggal_diapprove_owner', 'tanggal_diterima_adhikarya'
    ];

    public function jenisdokumen() {
      return $this->belongsTo('App\Models\JenisDokumen', 'id_jenis_dokumen', 'id_jenis_dokumen');
    }

    public function lampiran_engineering() {
        return $this->hasMany('App\Models\LampiranEngineering', 'id_dokumen');
    }

    public function lampiran_finance() {
        return $this->hasMany('App\Models\LampiranFinance', 'id_dokumen');
    }

    public function lampiran_mutu() {
        return $this->hasMany('App\Models\LampiranMutu', 'id_dokumen');
    }

    public function lampiran_production() {
        return $this->hasMany('App\Models\LampiranProduction', 'id_dokumen');
    }

    public function lampiran_hse() {
        return $this->hasMany('App\Models\LampiranHse', 'id_dokumen');
    }

    public function lampiran_sekretariat() {
        return $this->hasMany('App\Models\LampiranSekretariat', 'id_dokumen');
    }
}
