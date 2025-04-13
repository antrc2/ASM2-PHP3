<?php

namespace Database\Seeders;

use App\Models\Account;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Account::create([
            "fullname" => "Admin Account",
            "username" => "admin",
            "password" => Hash::make('admin123'),
            "email" => "admin@example.com",
            "phone" => "0909000000",
            "address" => "123 Admin Street",
        ]);

        Account::create([
            "fullname" => "User Account",
            "username" => "user",
            "password" => Hash::make('user123'),
            "email" => "user@example.com",
            "phone" => "0909111222",
            "address" => "456 User Road",
        ]);
    }
}
