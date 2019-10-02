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
          'nama_divisi'=>'ENGINEERING', 'created_at'=>$today, 'updated_at'=>$today),
          'nama_divisi'=>'PRODUCTION', 'created_at'=>$today, 'updated_at'=>$today),
          'nama_divisi'=>'FINANCE', 'created_at'=>$today, 'updated_at'=>$today),
          'nama_divisi'=>'SEKRETARIAT', 'created_at'=>$today, 'updated_at'=>$today),
          'nama_divisi'=>'MUTU', 'created_at'=>$today, 'updated_at'=>$today),
          'nama_divisi'=>'HSE / K3L', 'created_at'=>$today, 'updated_at'=>$today),
        ));
    }
}
