<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Message;
use Auth;

class MessageController extends Controller
{
    public function index()
    {
        // ログインしていれば、user情報を返す
        if (Auth::check()) {
            $user = User::where('id', Auth::id())->first();
        } else {
            $user = [];
        }

        return view('index', ['user' => $user]);
    }

    public function getMessages()
    {
        $messages = Message::orderBy('created_at', 'desc')->get();
        foreach ($messages as $message) {
            // ユーザ名を取得
            $name = $message->user()->first()->name;
            // ユーザ名を指定していない場合、名無しにする
            $message->nickname = !is_null($name) ? $name : '名無し';

            $message->me = $message->user_id == Auth::id();
        }
        echo json_encode($messages);
    }

    public function getNickname()
    {
        $user = User::where('id', Auth::id())->first();

        if (!is_null($user->nickname)) {
            $nickname = $user->nickname;
        } else {
            $nickname = $user->name;
        }

        echo json_encode(['nickname' => $nickname]);
    }
}
