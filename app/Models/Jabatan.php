<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jabatan extends Model
{
    protected $table = 'jabatan';

    protected $primaryKey = 'id_jabatan';

    public $incrementing = true;

    public $timestamps = true;

    protected $fillable = [
    	'nama_jabatan',
    ];

    public function user() {
        return $this->hasMany('App\User');
    }
}
