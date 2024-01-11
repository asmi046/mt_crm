<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\Hash;
use DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table("users")->insertGetId(
            [
                    'name' => "Администратор",
                    'agency' => "Мир туризма",
                    'phone' => "+7 (903) 633 08 01",
                    'email' => "asmi046@gmail.com",
                    'password' => Hash::make("0001"),
                    'email_verified_at' => date("Y-m-d H:i:s")
            ]
        );
    }
}
