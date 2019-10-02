<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JenisDokumen extends Model
{
    protected $table = 'jenis_dokumen';

    protected $primaryKey = 'id_jenis_dokumen';

    public $incrementing = true;

    public $timestamps = true;

    protected $fillable = [
    	'nama_jabatan',
    ];

    public function dokumen() {
        return $this->hasMany('App\Dokumen');
    }
}
