<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Filters\UserFilter;
use Illuminate\Http\Request;

class UserListController extends Controller
{
    public function activate($id) {
        $user = User::where('id',$id)->first();

        $user->forceFill(['email_verified_at' => date("Y-m-d H:i:s")])->save();

        return redirect()->back()->with('user_activate', "Пользователь активирован");
    }

    public function deactivate($id) {
        $user = User::where('id',$id)->first();

        $user->forceFill(['email_verified_at' => null])->save();

        return redirect()->back()->with('user_activate', "Пользователь заблокирован");
    }

    public function index(UserFilter $request) {
        $users = User::filter($request)->paginate(15)->withQueryString();

        return view('show_user_list',[
            'users' => $users,
        ]);

    }
}
