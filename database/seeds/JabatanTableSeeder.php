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
          array('nama_jabatan'=>'Surveyor', 'created_at'=>$today, 'updated_at'=>$today),
          array('nama_jabatan'=>'Planning', 'created_at'=>$today, 'updated_at'=>$today),
          array('nama_jabatan'=>'Procurement', 'created_at'=>$today, 'updated_at'=>$today),
          array('nama_jabatan'=>'Quantity Surveyor', 'created_at'=>$today, 'updated_at'=>$today),
          array('nama_jabatan'=>'Quality Control', 'created_at'=>$today, 'updated_at'=>$today),
          array('nama_jabatan'=>'Ast. Mekanik', 'created_at'=>$today, 'updated_at'=>$today),
          array('nama_jabatan'=>'Ast. Surveyor', 'created_at'=>$today, 'updated_at'=>$today),
          array('nama_jabatan'=>'Adm. Teknik', 'created_at'=>$today, 'updated_at'=>$today),
          array('nama_jabatan'=>'Cost Control', 'created_at'=>$today, 'updated_at'=>$today),
          array('nama_jabatan'=>'Akuntansi Keuangan', 'created_at'=>$today, 'updated_at'=>$today),
          array('nama_jabatan'=>'Bim Modeler', 'created_at'=>$today, 'updated_at'=>$today),
          array('nama_jabatan'=>'Drafter', 'created_at'=>$today, 'updated_at'=>$today),
          array('nama_jabatan'=>'Driver', 'created_at'=>$today, 'updated_at'=>$today),
          array('nama_jabatan'=>'Sekretaris', 'created_at'=>$today, 'updated_at'=>$today),
          array('nama_jabatan'=>'Mekanik', 'created_at'=>$today, 'updated_at'=>$today),
          array('nama_jabatan'=>'Gudang', 'created_at'=>$today, 'updated_at'=>$today),
          array('nama_jabatan'=>'QHSE', 'created_at'=>$today, 'updated_at'=>$today),
          array('nama_jabatan'=>'Kasir', 'created_at'=>$today, 'updated_at'=>$today),
          array('nama_jabatan'=>'Security', 'created_at'=>$today, 'updated_at'=>$today),
          array('nama_jabatan'=>'Logistik', 'created_at'=>$today, 'updated_at'=>$today),
          array('nama_jabatan'=>'Office Boy', 'created_at'=>$today, 'updated_at'=>$today),
          array('nama_jabatan'=>'Admin', 'created_at'=>$today, 'updated_at'=>$today),
        ));
    }
}
