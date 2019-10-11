<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LampiranMutu extends Model
{
    protected $table = 'lampiran_mutu';

    protected $primaryKey = 'id_lampiran_mutu';

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
