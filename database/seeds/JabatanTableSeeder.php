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
          array('nama_jabatan'=>'Project Manager', 'created_at'=>$today, 'updated_at'=>$today),
          array('nama_jabatan'=>'Deputi Project Manager', 'created_at'=>$today, 'updated_at'=>$today),
          array('nama_jabatan'=>'Project Engineer Manager', 'created_at'=>$today, 'updated_at'=>$today),
          array('nama_jabatan'=>'Project Commercial Manager', 'created_at'=>$today, 'updated_at'=>$today),
          array('nama_jabatan'=>'Project Finance Manager', 'created_at'=>$today, 'updated_at'=>$today),
          array('nama_jabatan'=>'Project Production Manager', 'created_at'=>$today, 'updated_at'=>$today),
          array('nama_jabatan'=>'Supervisor', 'created_at'=>$today, 'updated_at'=>$today),
          array('nama_jabatan'=>'Supervisor MEP', 'created_at'=>$today, 'updated_at'=>$today),
          array('nama_jabatan'=>'Planning', 'created_at'=>$today, 'updated_at'=>$today),
          array('nama_jabatan'=>'Admin', 'created_at'=>$today, 'updated_at'=>$today),
        ));
    }
}
