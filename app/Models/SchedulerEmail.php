<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SchedulerEmail extends Model
{
    protected $table = 'scheduler_email';

    protected $primaryKey = 'id_scheduler_email';

    public $incrementing = true;

    public $timestamps = true;

    protected $fillable = [
      'id_user', 'id_dokumen', 'status_dokumen', 'schedule_time'
    ];

    public function user() {
      return $this->belongsTo('App\User', 'id_user', 'id_user');
    }

   public function dokumen() {
     return $this->belongsTo('App\Dokumen', 'id_dokumen', 'id_dokumen');
   }
}
