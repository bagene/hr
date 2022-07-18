<?php

namespace Database\Seeders;

use App\Models\Organization;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(PermissionSeeder::class);
        $superadmin = User::create([
            'name' => 'Super Admin',
            'email' => 'admin@example.org',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ]);

        $superadmin->assignRole('superadmin');

        Organization::factory(20)->create()->each(function ($org) {
            $roles = ['admin', 'employee'];
            $users = \App\Models\User::factory(10)
                ->create()
                ->each(fn ($user) => $user->assignRole($roles[rand(0,1)]));
            $org->users()->saveMany($users);
        });
    }
}
