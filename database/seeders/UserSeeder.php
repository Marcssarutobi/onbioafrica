<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'full_name' => 'Superadmin',
                'email' => 'superadmin@onebioafrica.com',
                'role' => 'superadmin',
                'password' => 'onebioafricaSuper@2025',
            ],
            [
                'full_name' => 'Admin',
                'email' => 'admin@onebioafrica.com',
                'role' => 'admin',
                'password' => 'onebioafricaAdmin@2025',
            ],
        ];

        foreach ($users as $user) {

            DB::table('users')->insert([
                'fullname' => $user['full_name'],
                'email' => $user['email'],
                'password' => Hash::make($user['password']), // personnalisé
                'role' => $user['role'],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}
