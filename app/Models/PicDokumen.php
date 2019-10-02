<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PicDokumen extends Model
{
    protected $table = 'pic_dokumen';

    protected $primaryKey = 'id_pic_dokumen';

    public $incrementing = true;

    public $timestamps = true;

    protected $fillable = [
      'id_user', 'id_dokumen'
    ];

    public function user() {
      return $this->belongsTo('App\User', 'id_user', 'id_user');
    }

   public function dokumen() {
     return $this->belongsTo('App\Dokumen', 'id_dokumen', 'id_dokumen');
   }
}
