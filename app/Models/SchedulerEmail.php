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
      'id_pic_dokumen', 'status_scheduler', 'schedule_time'
    ];

    public function picdokumen() {
      return $this->hasOne('App\PicDokumen', 'id_pic_dokumen', 'id_pic_dokumen');
    }

}
