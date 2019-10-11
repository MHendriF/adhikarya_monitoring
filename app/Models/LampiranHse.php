<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LampiranHse extends Model
{
    protected $table = 'lampiran_hse';

    protected $primaryKey = 'id_lampiran_finance';

    public $incrementing = true;

    public $timestamps = true;

    protected $fillable = [
      'id_dokumen',
    	'nama_file',
    	'path',
    ];

    public function dokumen() {
        return $this->hasMany('App\Dokumen');
    }
}
