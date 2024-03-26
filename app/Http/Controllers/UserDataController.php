<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\UserDataFormRequest;
use App\Http\Requests\UserPasswordFormRequest;

class UserDataController extends Controller
{
    public function index() {
        $user = User::where('id', auth()->user()->id)->first();
        return view('user-data', ['user' => $user]);
    }

    public function save_user_data(UserDataFormRequest $request) {
        $data = $request->validated();

        $user = User::where('id', auth()->user()->id)->first();

        $user->forceFill($data);
        $user->save();

        return redirect()->route('user-data')->with(['success_user_data' => 'Данные пользователя сохранены']);
    }

    public function chenge_user_password(UserPasswordFormRequest $request) {
        $data = $request->validated();
        $user = User::where('id', auth()->user()->id)->first();

        $user->forceFill($data);
        $user->save();

        return redirect()->route('user-data')->with(['success_user_pass' => 'Пароль успешно изменен']);
    }



}
