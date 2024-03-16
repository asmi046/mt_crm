<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\Hash;
use DB;

class AgencySeeder extends Seeder
{
    // pa app:create-user --name Asmi --email asmi046@gmail.com --pass 123 --agency MT
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        include "data/mt_br_user.php";

        foreach ($mt_br_user as $item) {

            DB::table("users")->insert(
                [
                    'name' => $item['person'],
                    'agency' => $item['naim'],
                    'phone' => $item['phone'],
                    'email' => $item['mail'],
                    'password' => Hash::make($item['pass']),
                    'role'=>"agent",
                    'email_verified_at' => date("Y-m-d H:i:s")
                ]
            );
        }
    }
}
