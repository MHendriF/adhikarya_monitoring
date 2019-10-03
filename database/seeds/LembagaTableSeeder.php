<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class LembagaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('lembaga')->delete();
        $today =  Carbon::now()->format('Y-m-d H:i:s');

        DB::table('lembaga')->insert(array(
          array('nama_lembaga'=>'OWNER', 'keterangan_lembaga'=>'', 'created_at'=>$today, 'updated_at'=>$today),
          array('nama_lembaga'=>'KONSULTAN QS', 'keterangan_lembaga'=>'', 'created_at'=>$today, 'updated_at'=>$today),
          array('nama_lembaga'=>'KONSULTAN PERENCANAAN', 'keterangan_lembaga'=>'', 'created_at'=>$today, 'updated_at'=>$today),
          array('nama_lembaga'=>'KONSULTAN MK', 'keterangan_lembaga'=>'', 'created_at'=>$today, 'updated_at'=>$today),
          array('nama_lembaga'=>'KONTRAKTOR', 'keterangan_lembaga'=>'', 'created_at'=>$today, 'updated_at'=>$today),
        ));
    }
}
