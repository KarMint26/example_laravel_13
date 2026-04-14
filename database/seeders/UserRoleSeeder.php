<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // Daftar Roles
        $roles = ['Admin', 'Employee', 'Engineer'];
        // $roles = ['Freelancer', 'Client'];

        // Buat Roles
        foreach ($roles as $role) {
            Role::create(['name' => $role]);
        }

        // Buat User Admin
        $admin = User::create([
            'name' => 'Admin Solution Ticket',
            'email' => 'admin.solutionticket@gmail.com',
            'password' => Hash::make('admin_ticket_123'),
        ]);
        $admin->assignRole('Admin');

        // Buat User Employee
        $employee = User::create([
            'name' => 'Employee Solution Ticket',
            'email' => 'emp.solutionticket@gmail.com',
            'password' => Hash::make('emp_ticket_123'),
        ]);
        $employee->assignRole('Employee');

        // Buat User Engineer
        $engineer = User::create([
            'name' => 'Engineer Solution Ticket',
            'email' => 'eng.solutionticket@gmail.com',
            'password' => Hash::make('eng_ticket_123'),
        ]);
        $engineer->assignRole('Engineer');
    }
}
