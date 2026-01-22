<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $users = [
            [
                'name' => 'Super Administrator',
                'email' => 'superadmin@spj.go.id',
                'password' => Hash::make('super123'),
                'role' => 'super_admin',
                'status' => 'active',
            ],
            [
                'name' => 'Admin Unit',
                'email' => 'admin@spj.go.id',
                'password' => Hash::make('admin123'),
                'role' => 'admin',
                'status' => 'active',
            ],
            [
                'name' => 'Budi Santoso',
                'email' => 'budi@spj.go.id',
                'password' => Hash::make('user123'),
                'role' => 'user',
                'status' => 'active',
            ],
            [
                'name' => 'Siti Rahma',
                'email' => 'siti@spj.go.id',
                'password' => Hash::make('user123'),
                'role' => 'user',
                'status' => 'active',
            ],
        ];

        foreach ($users as $user) {
            User::updateOrCreate(
                ['email' => $user['email']],
                $user
            );
        }

        $this->command->info('User seeder completed! ' . count($users) . ' users created/updated.');
    }
}
