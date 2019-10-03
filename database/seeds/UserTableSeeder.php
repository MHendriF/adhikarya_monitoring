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
           array('username'=>'admin', 'email'=>'admin@adikarya.co.id', 'password'=>bcrypt('admin@123'), 'nama_user'=>'Admin', 'nohp'=>'081', 'id_jabatan'=>'10', 'id_divisi'=>'1', 'id_lembaga'=>'5', 'created_at'=>$today, 'updated_at'=>$today),
           array('username'=>'user1', 'email'=>'user1@adikarya.co.id', 'password'=>bcrypt('zxcasd123'), 'nama_user'=>'User1', 'nohp'=>'082', 'id_jabatan'=>'10', 'id_divisi'=>'2', 'id_lembaga'=>'4', 'created_at'=>$today, 'updated_at'=>$today),
           array('username'=>'user2', 'email'=>'user2@adikarya.co.id', 'password'=>bcrypt('zxcasd123'), 'nama_user'=>'User2', 'nohp'=>'082', 'id_jabatan'=>'10', 'id_divisi'=>'3', 'id_lembaga'=>'3', 'created_at'=>$today, 'updated_at'=>$today),
           array('username'=>'user3', 'email'=>'user3@adikarya.co.id', 'password'=>bcrypt('zxcasd123'), 'nama_user'=>'User3', 'nohp'=>'082', 'id_jabatan'=>'10', 'id_divisi'=>'4', 'id_lembaga'=>'2', 'created_at'=>$today, 'updated_at'=>$today),
        ));
    }
}
