<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Đảm bảo xóa cache quyền
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();
        
        // 1. Tạo các quyền cơ bản
        $permissions = [
            'view_dashboard',
            'manage_products',
            'manage_categories',
            'manage_orders',
            'manage_users',
            'manage_settings'
        ];
        
        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }
        
        // 2. Tạo role admin và gán tất cả quyền
        $adminRole = Role::firstOrCreate(['name' => 'admin']);
        $adminRole->syncPermissions(Permission::all());
        
        // 3. Tạo hoặc cập nhật user admin
        $admin = User::updateOrCreate(
            ['email' => 'admin@fpt.com'],
            [
                'name' => 'Admin FPT',
                'password' => Hash::make('Nl110024'),
                'role' => 1, // 1 = Admin trong database
            ]
        );
        
        // 4. Gán role admin qua Spatie Permission
        $admin->syncRoles('admin');
        
        $this->command->info('Đã tạo/cập nhật tài khoản admin: admin@fpt.com');
    }
}
