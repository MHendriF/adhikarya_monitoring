<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Divisi extends Model
{
    protected $table = 'divisi';

    protected $primaryKey = 'id_divisi';

    public $incrementing = true;

    public $timestamps = true;

    protected $fillable = [
        'nama_divisi', 'keterangan_divisi'
    ];

    public function user() {
      return $this->hasMany('App\User');
    }
}
