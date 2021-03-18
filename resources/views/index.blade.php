@extends('layouts.app')

@section('content')

<div class="my-5 text-center">
    <h1>Thank You Board</h1>
    <p>〜身近な人などに感謝を伝える掲示板〜</p>
</div>
<div id="app">
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