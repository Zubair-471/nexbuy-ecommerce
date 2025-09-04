<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Get the admin role (should be created by RolePermissionSeeder)
        $adminRole = Role::where('name', 'admin')->first();
        
        if (!$adminRole) {
            $this->command->error('Admin role not found. Please run RolePermissionSeeder first.');
            return;
        }

        // Create admin user
        $adminUser = User::firstOrCreate(
            ['email' => 'admin@nexbuy.com'],
            [
                'name' => 'Admin User',
                'password' => Hash::make('password123'),
                'role_id' => $adminRole->id,
                'email_verified_at' => now(),
            ]
        );

        // Ensure admin role is assigned
        if ($adminUser->role_id !== $adminRole->id) {
            $adminUser->role_id = $adminRole->id;
            $adminUser->save();
        }

        $this->command->info('Admin user created/updated successfully!');
        $this->command->info('Email: admin@nexbuy.com');
        $this->command->info('Password: password123');
    }
}
