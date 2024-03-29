<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\Hash;
use DB;

class UserSeeder extends Seeder
{
    // pa app:create-user --name Asmi --email asmi046@gmail.com --pass 123 --agency MT
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table("users")->insert([
            [
                    'name' => "Ирина",
                    'agency' => "Мир туризма",
                    'phone' => "+7 (000) 000 00 01",
                    'email' => "irina_mirturizma-kursk2@yandex.ru",
                    'password' => Hash::make("0001"),
                    'role'=>"worker",
                    'email_verified_at' => date("Y-m-d H:i:s")
            ],

            [
                    'name' => "Елена",
                    'agency' => "Мир туризма",
                    'phone' => "+7 (000) 000 00 02",
                    'email' => "elena_mirturizma-kursk2@yandex.ru",
                    'role'=>"worker",
                    'password' => Hash::make("0002"),
                    'email_verified_at' => date("Y-m-d H:i:s")
            ],
            [
                    'name' => "Кристина",
                    'agency' => "Мир туризма",
                    'phone' => "+7 (000) 000 00 03",
                    'email' => "kristina_mirturizma-kursk2@yandex.ru",
                    'password' => Hash::make("0003"),
                    'role'=>"worker",
                    'email_verified_at' => date("Y-m-d H:i:s")
            ],
            [
                    'name' => "Павел Алексеевич",
                    'agency' => "Мир туризма",
                    'phone' => "+7 (000) 000 00 04",
                    'email' => "mirturizma-kursk2@yandex.ru",
                    'password' => Hash::make("0004"),
                    'role'=>"admin",
                    'email_verified_at' => date("Y-m-d H:i:s")
            ],
            [
                    'name' => "Елена Владимировна",
                    'agency' => "Мир туризма",
                    'phone' => "+7 (000) 000 00 05",
                    'email' => "ev_mirturizma-kursk2@yandex.ru",
                    'password' => Hash::make("0005"),
                    'role'=>"admin",
                    'email_verified_at' => date("Y-m-d H:i:s")
            ],

            [
                'name' => "Asmi",
                'agency' => "Мир туризма",
                'phone' => "+7 (333) 000 00 33",
                'email' => "asmi046@gmail.com",
                'password' => Hash::make("123"),
                'role'=>"admin",
                'email_verified_at' => date("Y-m-d H:i:s")
            ]
        ]

        );
    }
}
