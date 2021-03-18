<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="twitter:card" content="summary">
    <meta name="twitter:site" content="@tomoaki052618"/>
    <meta property="og:url" content="https://thank-you-board.work/" />
    <meta property="og:title" content="Thank You Board" /> 
    <meta property="og:description" content="日頃の感謝の気持ちなど、なんでも投稿できる掲示板です" /> 
    <meta property="og:image" content="https://skillup-blog.com/wp-content/uploads/2021/01/courtney-hedger-t48eHCSCnds-unsplash-scaled.jpg" />
    <title>Thankyou-board</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <link rel="stylesheet" href="{{ mix('/css/app.css') }}">
</head>
<body>
    <div class="container bg-white py-5">
        @yield('content')
    </div>

    <!-- google login -->
    <script src="https://apis.google.com/js/platform.js" async defer></script>
    <script src=" {{ mix('js/app.js') }} "></script>
</body>
</html>
