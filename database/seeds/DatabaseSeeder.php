<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $this->call(DivisiTableSeeder::class);
        $this->command->info("Divisi table seeding is completed :)");

        $this->call(JabatanTableSeeder::class);
        $this->command->info("Jabatan table seeding is completed :)");

        $this->call(LembagaTableSeeder::class);
        $this->command->info("Lembaga table seeding is completed :)");

        $this->call(UserTableSeeder::class);
        $this->command->info("User table seeding is completed :)");

        $this->call(JenisDokumenTableSeeder::class);
        $this->command->info("Jenis Dokumen table seeding is completed :)");

        $this->call(PermissionTableSeeder::class);
        $this->command->info("Permission table seeding is completed :)");

        $this->call(RoleTableSeeder::class);
        $this->command->info("Role table seeding is completed :)");
    }
}
