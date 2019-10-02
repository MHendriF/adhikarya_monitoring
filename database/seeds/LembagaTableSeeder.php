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
          'nama_lembaga'=>'OWNER', 'created_at'=>$today, 'updated_at'=>$today),
          'nama_lembaga'=>'KONSULTAN QS', 'created_at'=>$today, 'updated_at'=>$today),
          'nama_lembaga'=>'KONSULTAN PERENCANAAN', 'created_at'=>$today, 'updated_at'=>$today),
          'nama_lembaga'=>'KONSULTAN MK', 'created_at'=>$today, 'updated_at'=>$today),
          'nama_lembaga'=>'KONTRAKTOR', 'created_at'=>$today, 'updated_at'=>$today),
        ));
    }
}
