<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user')->delete();
        $today =  Carbon::now()->format('Y-m-d H:i:s');

        DB::table('user')->insert(array(
           array('username'=>'admin', 'email'=>'admin@adikarya.co.id', 'password'=>bcrypt('admin@123'), 'nama_user'=>'Admin', 'id_jabatan'=>'10', 'id_divisi'=>'1', 'id_lembaga'=>'5', 'created_at'=>$today, 'updated_at'=>$today),
           array('username'=>'user1', 'email'=>'user1@adikarya.co.id', 'password'=>bcrypt('zxcasd123'), 'nama_user'=>'User1', 'id_jabatan'=>'10', 'id_divisi'=>'1', 'id_lembaga'=>'5', 'created_at'=>$today, 'updated_at'=>$today),
        ));
    }
}
