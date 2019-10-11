<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LampiranProduction extends Model
{
    protected $table = 'lampiran_production';

    protected $primaryKey = 'id_lampiran_production';

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
