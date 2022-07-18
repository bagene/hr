<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sAdmin = Role::create(['name' => 'superadmin']);
        $oAdmin = Role::create(['name' => 'admin']);
        $oEmployee = Role::create(['name' => 'employee']);
        $superAdmin = [
            'organization' => [
                'create', 'edit', 'delete',
            ],
        ];

        foreach($superAdmin as $idx => $permissions) {
            foreach($permissions as $permission) {
                Permission::create(['name' => "{$idx}.$permission"])
                    ->assignRole($sAdmin);
            }
        }
    }
}
