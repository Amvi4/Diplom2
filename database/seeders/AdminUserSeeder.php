<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        User::updateOrCreate(
            ['name' => 'Admin'],
            [
                'phone' => '89999999999',
                'email' => 'admin@example.com',
                'password' => 'Administrator',
                'is_admin' => 1,
            ],
        );

    }
}
