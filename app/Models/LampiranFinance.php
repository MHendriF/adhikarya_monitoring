<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LampiranFinance extends Model
{
    protected $table = 'lampiran_finance';

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
