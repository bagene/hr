<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Arr;

class PermissionSeeder extends Seeder
{
    const PERMISSION_NAMES = [
        'index', 'create', 'edit', 'delete',
    ];
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
        $allPermissions = [
            'organization' => self::PERMISSION_NAMES,
            'employee' => self::PERMISSION_NAMES,
            'department' => self::PERMISSION_NAMES,
            'schedule' => self::PERMISSION_NAMES,
        ];

        foreach($allPermissions as $idx => $permissions) {
            foreach($permissions as $permission) {
                Permission::create(['name' => "{$idx}.$permission"])
                    ->assignRole($sAdmin);
            }
        }

        foreach(Arr::only($allPermissions, ['employee', 'department', 'schedule']) as $idx => $permissions) {
            foreach($permissions as $permission) {
                $oAdmin->givePermissionTo("{$idx}.$permission");
            }
        }
    }
}
