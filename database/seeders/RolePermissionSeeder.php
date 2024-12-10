<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create roles
        $admin = Role::create(['name' => 'Admin']);
        $departmentHead = Role::create(['name' => 'Department Head']);
        $financeOfficer = Role::create(['name' => 'Finance Officer']);

        // Create permissions
        Permission::create(['name' => 'manage strategic areas']);
        Permission::create(['name' => 'manage objectives']);
        Permission::create(['name' => 'manage workplans']);
        Permission::create(['name' => 'manage scorecards']);
        Permission::create(['name' => 'view financial data']);

        // Assign permissions to roles
        $admin->givePermissionTo(Permission::all());
        $departmentHead->givePermissionTo(['manage objectives', 'manage workplans']);
        $financeOfficer->givePermissionTo(['view financial data']);
    }
}
