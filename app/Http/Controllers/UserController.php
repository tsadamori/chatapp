<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use Auth;

class UserController extends Controller
{
    public function nickname()
    {
        $user = User::where('id', Auth::id())->first();
        if (is_null($user->nickname)) {
            $user->nickname = '';
        }

        return view('user.nickname', ['user' => $user]);
    }

    public function update_nickname(Request $request)
    {
        $user = User::where('id', Auth::id())->first();
        $user->nickname = $request->nickname;
        $user->save();

        return redirect('/');
    }
}
