<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Filters\UserFilter;
use Illuminate\Http\Request;

class UserListController extends Controller
{
    public function index(UserFilter $request) {
        $users = User::filter($request)->paginate(15);

        return view('show_user_list',[
            'users' => $users,
        ]);

    }
}
