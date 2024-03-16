<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use Illuminate\Support\Facades\Hash;
use App\Models\User;

class CreateUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:create-user {--N|name= : Имя пользователя} {--E|email= : Электронная почта} {--P|pass= : Пароль} {--A|agency= : Агентство}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Создает нового пользователя';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $name = $this->option('name')?$this->option('name'):"Пользователь";
        $email = $this->option('email')?$this->option('email'):"user".date("d.m.i.s")."@mail.ru";
        $agency = $this->option('agency')?$this->option('agency'):"Рога и капыта";
        $pass_nh = $this->option('pass')?$this->option('pass'):'123';
        $pass = $this->option('pass')?Hash::make($this->option('pass')):Hash::make('123');

        $user = User::create([
            'name' => $name,
            'email' => $email,
            'phone' => "+7 (000) 000 00 00",
            'role' => "admin",
            'agency' => $agency,
            'password' => $pass
        ]);

        printf("Создан пользователь: \n\r%s \n\r%s \n\r%s", $name, $email, $pass_nh);

    }
}
