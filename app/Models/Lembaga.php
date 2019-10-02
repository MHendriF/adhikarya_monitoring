<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lembaga extends Model
{
    protected $table = 'lembaga';

    protected $primaryKey = 'id_lembaga';

    public $incrementing = true;

    public $timestamps = true;

    protected $fillable = [
      'nama_lembaga', 'keterangan_lembaga'
    ];

    public function user() {
        return $this->hasMany('App\User');
    }
}
