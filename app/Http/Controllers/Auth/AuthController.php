<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Mail\Auth\PassRecMail;

use App\Actions\TelegramSendAction;

use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Mail;
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

    public function show_passrec_form(Request $request) {
        return view('pass-rec', ['confirm' => $request->get('confirm')]);
    }

    public function logout() {
        auth('web')->logout();
        return redirect(route('login'));
    }

    public function pass_req(Request $request) {
        $data = $request->validate([
            "email" => ['required', 'string', 'email', 'exists:users']
        ]);

        $user = User::where('email', $data['email'])->first();

        $new_password = uniqid();
        $user->password = bcrypt($new_password);
        $user->save();

        $tgsender = new TelegramSendAction();
        $t_msg = "<b>Пользователь: ".$user->name." (".$user->agency.")</b>\n\rВосстановил пароль";
        $tmp = $tgsender->handle($t_msg);

        Mail::to($user)->send(new PassRecMail($new_password));
        return redirect(route('passrec',['confirm' => 1]));
    }

    public function login(LoginFormRequest $request) {
        $user_data = $request->validated();

        if(auth('web')->attempt($user_data)) {
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
