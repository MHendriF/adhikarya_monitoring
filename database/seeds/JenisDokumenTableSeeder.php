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
        DB::table('divisi')->delete();
        $today =  Carbon::now()->format('Y-m-d H:i:s');

        DB::table('divisi')->insert(array(
          'kode_jenis_dokumen'=>'ENG', 'nama_jenis_dokumen'=>'ENGINEERING', 'created_at'=>$today, 'updated_at'=>$today),
          'nama_jenis_dokumen'=>'PR', 'created_at'=>$today, 'updated_at'=>$today),
          'nama_jenis_dokumen'=>'FI', 'created_at'=>$today, 'updated_at'=>$today),
          'nama_jenis_dokumen'=>'SEK', 'created_at'=>$today, 'updated_at'=>$today),
          'nama_jenis_dokumen'=>'MUTU', 'created_at'=>$today, 'updated_at'=>$today),
          'nama_jenis_dokumen'=>'HSE', 'created_at'=>$today, 'updated_at'=>$today),
        ));
    }
}
