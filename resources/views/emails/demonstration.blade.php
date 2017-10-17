<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/mail.css') }}">
    <title>Document</title>
</head>
<body>
<header>
    <p>FastMail</p>
</header>
<div class="content">
    <p>{!! $campaign->template->content !!}</p>
</div>
<footer>
    <p>© 2017 FastMail. All rights reserved.</p>
</footer>
</body>
</html>
