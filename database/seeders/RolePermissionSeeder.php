<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\Permission;
use Illuminate\Database\Seeder;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create permissions
        $permissions = [
            // Dashboard permissions
            'view_dashboard' => 'View Dashboard',
            
            // Product permissions
            'view_products' => 'View Products',
            'create_products' => 'Create Products',
            'edit_products' => 'Edit Products',
            'delete_products' => 'Delete Products',
            'manage_product_stock' => 'Manage Product Stock',
            
            // Category permissions
            'view_categories' => 'View Categories',
            'create_categories' => 'Create Categories',
            'edit_categories' => 'Edit Categories',
            'delete_categories' => 'Delete Categories',
            'reorder_categories' => 'Reorder Categories',
            
            // User permissions
            'view_users' => 'View Users',
            'create_users' => 'Create Users',
            'edit_users' => 'Edit Users',
            'delete_users' => 'Delete Users',
            'manage_user_status' => 'Manage User Status',
            
            // Order permissions
            'view_orders' => 'View Orders',
            'edit_orders' => 'Edit Orders',
            'delete_orders' => 'Delete Orders',
            'manage_order_status' => 'Manage Order Status',
            'export_orders' => 'Export Orders',
            
            // Settings permissions
            'view_settings' => 'View Settings',
            'edit_settings' => 'Edit Settings',
            
            // System permissions
            'view_reports' => 'View Reports',
            'export_data' => 'Export Data',
        ];

        foreach ($permissions as $key => $name) {
            Permission::firstOrCreate([
                'name' => $key,
                'display_name' => $name,
                'description' => "Permission to {$name}",
                'module' => $this->getModuleFromPermission($key),
            ]);
        }

        // Create roles
        $roles = [
            'super_admin' => [
                'display_name' => 'Super Administrator',
                'description' => 'Full system access with all permissions',
                'permissions' => array_keys($permissions),
            ],
            'admin' => [
                'display_name' => 'Administrator',
                'description' => 'Full administrative access',
                'permissions' => [
                    'view_dashboard',
                    'view_products', 'create_products', 'edit_products', 'delete_products', 'manage_product_stock',
                    'view_categories', 'create_categories', 'edit_categories', 'delete_categories', 'reorder_categories',
                    'view_users', 'create_users', 'edit_users', 'delete_users', 'manage_user_status',
                    'view_orders', 'edit_orders', 'delete_orders', 'manage_order_status', 'export_orders',
                    'view_settings', 'edit_settings',
                    'view_reports', 'export_data',
                ],
            ],
            'staff' => [
                'display_name' => 'Staff Member',
                'description' => 'Limited administrative access',
                'permissions' => [
                    'view_dashboard',
                    'view_products', 'edit_products', 'manage_product_stock',
                    'view_categories', 'edit_categories',
                    'view_users',
                    'view_orders', 'edit_orders', 'manage_order_status',
                    'view_settings',
                    'view_reports',
                ],
            ],
            'customer' => [
                'display_name' => 'Customer',
                'description' => 'Regular customer with no admin access',
                'permissions' => [],
            ],
        ];

        foreach ($roles as $name => $roleData) {
            $role = Role::firstOrCreate([
                'name' => $name,
                'display_name' => $roleData['display_name'],
                'description' => $roleData['description'],
            ]);

            // Attach permissions to role
            if (!empty($roleData['permissions'])) {
                $permissionIds = Permission::whereIn('name', $roleData['permissions'])->pluck('id');
                $role->permissions()->sync($permissionIds);
            }
        }
    }

    /**
     * Get the module name for a permission.
     */
    private function getModuleFromPermission(string $permission): string
    {
        if (str_contains($permission, 'dashboard')) {
            return 'dashboard';
        }
        if (str_contains($permission, 'product')) {
            return 'products';
        }
        if (str_contains($permission, 'categor')) {
            return 'categories';
        }
        if (str_contains($permission, 'user')) {
            return 'users';
        }
        if (str_contains($permission, 'order')) {
            return 'orders';
        }
        if (str_contains($permission, 'setting')) {
            return 'settings';
        }
        if (str_contains($permission, 'report')) {
            return 'reports';
        }
        
        return 'system';
    }
}
