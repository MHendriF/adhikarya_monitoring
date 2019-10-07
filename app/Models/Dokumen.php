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

    public function user() {
        return $this->hasMany('App\User');
    }
}
