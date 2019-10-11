<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LampiranEngineering extends Model
{
    protected $table = 'lampiran_engineering';

    protected $primaryKey = 'id_lampiran_engineering';

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
