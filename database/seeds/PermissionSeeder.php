<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        DB::table('permissions')->insert([
          ['permission' => 'admin'],
          ['permission' => 'user']
        ]);

        DB::table('actions')->insert([
          ['action' => 'upload'],
          ['action' => 'delete'],
          ['action' => 'edit']
        ]);

        DB::table('permissionActions')->insert([
          ['permissionKey' => '1', 'actionKey' => '1'],
          ['permissionKey' => '1', 'actionKey' => '2'],
          ['permissionKey' => '1', 'actionKey' => '3']
        ]);
    }
}
