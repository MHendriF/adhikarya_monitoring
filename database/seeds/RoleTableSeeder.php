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

        $role1 = Role::create(['name' => 'Super Admin']);
        $role2 = Role::create(['name' => 'Project Manager']);
        $role3 = Role::create(['name' => 'Project Department Manager']);
        $role4 = Role::create(['name' => 'Supervisor']);
        $role5 = Role::create(['name' => 'Staff']);

        $permissions = Permission::all();
        $role1->syncPermissions($permissions);
        $user1->assignRole([$role1->id]);

        $role2->syncPermissions($permissions);
        $user2->assignRole([$role2->id]);

        $role3->givePermissionTo(
          'dashboard',

          'view-document-engineering',
          'create-document-engineering',
          'edit-document-engineering',
          'download-document-engineering',

          'view-document-production',
          'create-document-production',
          'edit-document-production',
          'download-document-production',

          'view-document-finance',
          'create-document-finance',
          'edit-document-finance',
          'download-document-finance',

          'view-document-sekretariat',
          'create-document-sekretariat',
          'edit-document-sekretariat',
          'download-document-sekretariat',

          'view-document-mutu',
          'create-document-mutu',
          'edit-document-mutu',
          'download-document-mutu',

          'view-document-hse',
          'create-document-hse',
          'edit-document-hse',
          'download-document-hse'
        );

        $role4->givePermissionTo(
          'dashboard',

          'view-document-engineering',
          'create-document-engineering',
          'edit-document-engineering',
          'download-document-engineering',

          'view-document-production',
          'create-document-production',
          'edit-document-production',
          'download-document-production',

          'view-document-finance',
          'create-document-finance',
          'edit-document-finance',
          'download-document-finance',

          'view-document-sekretariat',
          'create-document-sekretariat',
          'edit-document-sekretariat',
          'download-document-sekretariat',

          'view-document-mutu',
          'create-document-mutu',
          'edit-document-mutu',
          'download-document-mutu',

          'view-document-hse',
          'create-document-hse',
          'edit-document-hse',
          'download-document-hse'
        );

        $role5->givePermissionTo(
          'dashboard',

          'view-document-engineering',
          'create-document-engineering',
          'download-document-engineering',

          'view-document-production',
          'create-document-production',
          'download-document-production',

          'view-document-finance',
          'create-document-finance',
          'download-document-finance',

          'view-document-sekretariat',
          'create-document-sekretariat',
          'download-document-sekretariat',

          'view-document-mutu',
          'create-document-mutu',
          'download-document-mutu',

          'view-document-hse',
          'create-document-hse',
          'download-document-hse'
        );


    }
}
