<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Carbon\Carbon;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // 1. Roles Setup
        $roles = ['Super Admin', 'Admin', 'User'];
        foreach ($roles as $roleName) {
            Role::firstOrCreate(['name' => $roleName]);
        }

        // 2. Create Super Admin
        $admin = User::firstOrCreate(
            ['email' => 'admin@gmail.com'],
            [
                'name' => 'Super Admin',
                'password' => Hash::make('Success2026$'),
                'is_verified' => 1,
            ]
        );
        $admin->assignRole('Super Admin');

        // 3. Dummy Users Data (10 Male, 10 Female)
        $districts = ['Kolkata', 'Murshidabad', 'Malda', 'North 24 Parganas', 'South 24 Parganas', 'Howrah', 'Hooghly', 'Nadia', 'Birbhum', 'Burdwan'];
        $sects = ['Sunni', 'Shia'];
        $maslaks = ['Deobandi', 'Barelvi', 'Ahle-Hadees', 'Tablighi', 'General'];
        $namaz = ['Always', 'Usually', 'Sometimes'];

        $dummyUsers = [];

        // Generate 10 Males
        for ($i = 1; $i <= 10; $i++) {
            $dummyUsers[] = [
                'name' => "Brother User $i",
                'email' => "male$i@example.com",
                'gender' => 'male',
                'district' => $districts[$i - 1],
                'city' => $districts[$i - 1] . " City",
                'sect' => 'Sunni',
                'sub_sect' => $maslaks[array_rand($maslaks)],
                'salary' => rand(300000, 1200000),
            ];
        }

        // Generate 10 Females
        for ($i = 1; $i <= 10; $i++) {
            $dummyUsers[] = [
                'name' => "Sister User $i",
                'email' => "female$i@example.com",
                'gender' => 'female',
                'district' => $districts[$i - 1],
                'city' => $districts[$i - 1] . " Town",
                'sect' => ($i == 5) ? 'Shia' : 'Sunni',
                'sub_sect' => $maslaks[array_rand($maslaks)],
                'salary' => rand(0, 500000),
            ];
        }

        // 4. Create and Assign Role to Dummy Users
        foreach ($dummyUsers as $data) {
            $user = User::firstOrCreate(
                ['email' => $data['email']],
                [
                    'name' => $data['name'],
                    'password' => Hash::make('Success2026$'),
                    'gender' => $data['gender'],
                    'date_of_birth' => Carbon::now()->subYears(rand(20, 35))->format('Y-m-d'),
                    'phone' => '91' . rand(7000000000, 9999999999),
                    'phone_verified_at' => now(),
                    'is_verified' => rand(0, 1),
                    'account_for' => 'self',
                    'country' => 'India',
                    'state' => 'West Bengal',
                    'district' => $data['district'],
                    'city' => $data['city'],
                    'pincode' => rand(700001, 743000),
                    'sect' => $data['sect'],
                    'sub_sect' => $data['sub_sect'],
                    'namaz_frequency' => $namaz[array_rand($namaz)],
                    'salary' => $data['salary'],
                    'family_members' => rand(3, 8),
                    'status' => 'active',
                ]
            );
            $user->assignRole('User');
        }
    }
}
