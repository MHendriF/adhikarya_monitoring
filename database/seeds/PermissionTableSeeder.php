<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
          'dashboard',

          'view-document-engineering',
          'create-document-engineering',
          'edit-document-engineering',
          'delete-document-engineering',
          'download-document-engineering',

          'view-document-production',
          'create-document-production',
          'edit-document-production',
          'delete-document-production',
          'download-document-production',

          'view-document-finance',
          'create-document-finance',
          'edit-document-finance',
          'delete-document-finance',
          'download-document-finance',

          'view-document-sekretariat',
          'create-document-sekretariat',
          'edit-document-sekretariat',
          'delete-document-sekretariat',
          'download-document-sekretariat',

          'view-document-mutu',
          'create-document-mutu',
          'edit-document-mutu',
          'delete-document-mutu',
          'download-document-mutu',

          'view-document-hse',
          'create-document-hse',
          'edit-document-hse',
          'delete-document-hse',
          'download-document-hse'

        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }
    }
}
