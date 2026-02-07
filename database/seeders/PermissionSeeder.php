<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Dashboard
        Permission::firstOrCreate(['name' => 'Dashboard']);

        // Order
        Permission::firstOrCreate(['name' => 'Order-Index']);
        Permission::firstOrCreate(['name' => 'Order-Create']);
        Permission::firstOrCreate(['name' => 'Order-Edit']);
        Permission::firstOrCreate(['name' => 'Order-View']);
        Permission::firstOrCreate(['name' => 'Order-Delete']);
        Permission::firstOrCreate(['name' => 'Order-Approve']);
        Permission::firstOrCreate(['name' => 'Order-DownloadPdf']);
        Permission::firstOrCreate(['name' => 'Order-ChangeStatus']);
        Permission::firstOrCreate(['name' => 'Order-Dispatch']);

        // User Management
        Permission::firstOrCreate(['name' => 'UserManagement-Index']);
        Permission::firstOrCreate(['name' => 'UserManagement-Create']);
        Permission::firstOrCreate(['name' => 'UserManagement-Edit']);
        Permission::firstOrCreate(['name' => 'UserManagement-View']);
        Permission::firstOrCreate(['name' => 'UserManagement-Delete']);

        // Access Management
        Permission::firstOrCreate(['name' => 'AccessManagement-Index']);
        Permission::firstOrCreate(['name' => 'AccessManagement-Create']);
        Permission::firstOrCreate(['name' => 'AccessManagement-Edit']);
        Permission::firstOrCreate(['name' => 'AccessManagement-View']);
        Permission::firstOrCreate(['name' => 'AccessManagement-Delete']);

        // Company Settings
        Permission::firstOrCreate(['name' => 'Company-Index']);
        Permission::firstOrCreate(['name' => 'Company-Update']);

        $admin = Role::where('name', 'Admin')->first();

        $superAdmin = Role::where('name', 'Super Admin')->first();
        $permissions = Permission::all();

        $superAdmin->syncPermissions($permissions);

        $admin->givePermissionTo([

            'Dashboard',

            'Order-Index',
            'Order-Create',
            'Order-Edit',
            'Order-View',
            'Order-Approve',
            'Order-DownloadPdf',
            'Order-ChangeStatus',
        ]);
    }
}
