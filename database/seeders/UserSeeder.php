<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Users;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [

                'name' => 'admin3',
                'email' => 'admin3@example.com',
                'password' => bcrypt('12345678'),
                'phone_number' => '1234567898',
                'address' => '123 Admin St',
                'role' => 'admin',
                'is_blocked' => false,
            ]
            ,
            [
                'name' => 'moderator3',
                'email' => 'moderator3@example.com',
                'password' => bcrypt('12345678'),
                'phone_number' => '1234567897',
                'address' => '456 Moderator Ave',
                'role' => 'moderator',
                'is_blocked' => false,
            ],
            [
                'name' => 'employee3',
                'email' => 'employee3@example.com',
                'password' => bcrypt('12345678'),
                'phone_number' => '1234567896',
                'address' => '789 Employee Rd',
                'role' => 'employee',
                'is_blocked' => false,
            ],

        ];

        foreach ($users as $user) {
            Users::create($user);
        }
    }
}
