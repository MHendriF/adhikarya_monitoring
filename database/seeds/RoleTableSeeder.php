<?php

use App\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user1 = User::find(1);
        $user2 = User::find(2);
        $user3 = User::find(3);
        $user4 = User::find(4);

        $role1 = Role::create(['name' => 'Admin']);
        $role2 = Role::create(['name' => 'Finance']);
        $role3 = Role::create(['name' => 'Engineer']);
        $role4 = Role::create(['name' => 'Staff']);

        $permissions = Permission::pluck('id','id')->all();
        $role1->syncPermissions($permissions);
        $user1->assignRole([$role1->id]);

        $user2->assignRole([$role2->id]);
        $user3->assignRole([$role3->id]);
        $user4->assignRole([$role4->id]);



    }
}
