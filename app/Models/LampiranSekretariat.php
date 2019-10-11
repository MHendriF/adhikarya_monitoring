<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LampiranSekretariat extends Model
{
    protected $table = 'lampiran_sekretariat';

    protected $primaryKey = 'id_lampiran_sekretariat';

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
