<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class DivisiTableSeeder extends Seeder
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
          array('nama_divisi'=>'ENGINEERING', 'keterangan_divisi'=>'', 'created_at'=>$today, 'updated_at'=>$today),
          array('nama_divisi'=>'PRODUCTION', 'keterangan_divisi'=>'', 'created_at'=>$today, 'updated_at'=>$today),
          array('nama_divisi'=>'FINANCE', 'keterangan_divisi'=>'', 'created_at'=>$today, 'updated_at'=>$today),
          array('nama_divisi'=>'SEKRETARIAT', 'keterangan_divisi'=>'', 'created_at'=>$today, 'updated_at'=>$today),
          array('nama_divisi'=>'MUTU', 'keterangan_divisi'=>'', 'created_at'=>$today, 'updated_at'=>$today),
          array('nama_divisi'=>'HSE / K3L', 'keterangan_divisi'=>'', 'created_at'=>$today, 'updated_at'=>$today),
        ));
    }
}
