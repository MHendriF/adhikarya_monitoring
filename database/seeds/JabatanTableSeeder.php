<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class JabatanTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('jabatan')->delete();
        $today =  Carbon::now()->format('Y-m-d H:i:s');

        DB::table('jabatan')->insert(array(
          'nama_jabatan'=>'Project Manager', 'created_at'=>$today, 'updated_at'=>$today),
          'nama_jabatan'=>'KONSULTAN QS', 'created_at'=>$today, 'updated_at'=>$today),
          'nama_jabatan'=>'KONSULTAN PERENCANAAN', 'created_at'=>$today, 'updated_at'=>$today),
          'nama_jabatan'=>'KONSULTAN MK', 'created_at'=>$today, 'updated_at'=>$today),
          'nama_jabatan'=>'KONTRAKTOR', 'created_at'=>$today, 'updated_at'=>$today),
        ));
    }
}
