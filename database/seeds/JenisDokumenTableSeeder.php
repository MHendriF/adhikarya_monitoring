<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class JenisDokumenTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('jenis_dokumen')->delete();
        $today =  Carbon::now()->format('Y-m-d H:i:s');

        DB::table('jenis_dokumen')->insert(array(
          array('kode_jenis_dokumen'=>'ENG', 'nama_jenis_dokumen'=>'ENGINEERING', 'created_at'=>$today, 'updated_at'=>$today),
          array('kode_jenis_dokumen'=>'PR', 'nama_jenis_dokumen'=>'PRODUCTION', 'created_at'=>$today, 'updated_at'=>$today),
          array('kode_jenis_dokumen'=>'FI', 'nama_jenis_dokumen'=>'FINANCE', 'created_at'=>$today, 'updated_at'=>$today),
          array('kode_jenis_dokumen'=>'SEK', 'nama_jenis_dokumen'=>'SEKRETARIAT', 'created_at'=>$today, 'updated_at'=>$today),
          array('kode_jenis_dokumen'=>'MUTU', 'nama_jenis_dokumen'=>'MUTU', 'created_at'=>$today, 'updated_at'=>$today),
          array('kode_jenis_dokumen'=>'HSE', 'nama_jenis_dokumen'=>'HSE / K3L', 'created_at'=>$today, 'updated_at'=>$today),
        ));
    }
}
