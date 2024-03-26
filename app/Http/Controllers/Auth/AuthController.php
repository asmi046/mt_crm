<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Actions\LogAction;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Auth\Events\Registered;
use App\Http\Requests\LoginFormRequest;
use App\Http\Requests\RegisterFormRequest;


class AuthController extends Controller
{
    public function show_login_form() {
        return view('auth.login');
    }

    public function welcom() {
        return view('auth.welcom');
    }

    public function show_register_form() {
        return view('auth.register');
    }


    public function logout(LogAction $log) {
        $log->handle("Выход из системы", "Пользователь вышел из системы");
        auth('web')->logout();
        return redirect(route('login'));
    }



    public function login(LoginFormRequest $request, LogAction $log) {
        $user_data = $request->validated();

        // if (empty($user_data->email_verified_at)) {
        //     return redirect(route('login'))->withErrors(['email'=>'Ваша учетная запись не активирована']);
        // }

        if(auth('web')->attempt($user_data)) {
            $log->handle("Вход в систему", "Пользователь вошел в систему");
            if (auth()->user()->hasVerifiedEmail() === false) {

                auth('web')->logout();

                return redirect(route('login'))->withErrors(['email'=>'Ваша учетная запись не активирована']);
            }
            return redirect(route('proezd-bron'));
        }




        return redirect(route('login'))->withErrors(['email'=>'Неверный логин или пароль']);
    }



    public function save_user_data(Request $request) {
        $user_data = $request->validate([

        ]);

        $user = User::where('id', auth()->user()->id)->first()->update([
            'name' => $user_data['name'],
            'email' => $user_data['email'],
        ]);


        return redirect(route('cabinet.home'));
    }

    public function register(RegisterFormRequest $request) {
        $user_data = $request->validated();

        $user = User::create(
            [
                'name' => $user_data['name'],
                'email' => $user_data['email'],
                'phone' => $user_data['phone'],
                'password' => bcrypt($user_data['password']),
            ]
        );

        if ($user) {
            event(new Registered($user));
            auth('web')->login($user);
            return redirect(route('verification.notice'));
        }

        return redirect(route('home'));
    }


}
