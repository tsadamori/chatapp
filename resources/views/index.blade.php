@extends('layouts.app')

@section('content')

<div class="my-5 text-center">
    <h1>Thank You Board</h1>
    <p>〜身近な人などに感謝を伝える掲示板〜</p>
</div>
<div id="app">
    @guest
        <div class="text-center mb-5">
            <a href="login"><md-button class="md-raised md-fab-top-right
">ログインして投稿する</md-button></a>
        </div>
    @else
        <div class="text-center mb-5">
            @if (is_null($user->nickname))
                <a href="nickname"><input type="button" class="btn btn-primary" value="ニックネームを設定する"></a>
            @else
                <a href="nickname"><input type="button" class="btn btn-primary" value="ニックネームを変更する"></a>
            @endif

            <a href="logout"><input type="button" class="btn btn-secondary" value="ログアウト"></a>
        </div>
        <!-- ボタンエリア -->
        <div class="row m-0 m-lg-5 mb-5 px-2 py-5 px-lg-5 bg-dark">
            <div class="col-12 col-lg-9 mb-3 mb-lg-0">
                <input id="message" type="text" class="form-control" placeholder="メッセージを入力してください">
            </div>
            <div class="col-12 col-lg-3">
                <input @click="addItem" type="button" class="form-control btn btn-success" value="メッセージを送信">
            </div>
        </div>
    @endguest
    <ul v-if="messages.length > 0" id="message-list" class="list-unstyled line-bc">
        <li v-for="message in messages" class="my-4">
            <div v-if="message.me == true">
                <div class="mycomment">
                    <p class="text-white text-left">@{{ message.body }}</p>
                </div>
                <p>@{{ message.created_at }}</p>
            </div>
            <div v-else class="balloon6">
                <div class="chatting mb-3">
                    <div class="says">
                        <div class="message-content">
                            <p>@{{ message.body }}</p>
                        </div>
                    </div>
                </div>
                <p class="text-left ml-3">@{{ message.created_at }}　by @{{ message.nickname }}</p>
            </div>
        </li>
    </ul>
    <ul v-else>
        まだ投稿がありません。
    </ul>
</div>

@endsection