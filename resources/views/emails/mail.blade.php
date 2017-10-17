<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="http://fastmail/public/css/mail.css">
    <title>Document</title>
</head>
<body>
<header>
    <p>FastMail</p>
</header>
<div class="content">
    <p>{!! $msg !!}</p>
</div>
<footer>
    <p>© 2017 FastMail. All rights reserved.</p>
</footer>
</body>
</html>
<style>
    p{
        margin: 0;
    }
    header,
    footer{
        padding: 20px;
        background: #e8e8e8;
    }
    header p{
        font-size: 30px;
        color: #909090;
        text-align: center;
    }
    footer p{
        font-size: 12px;
        color: #909090;
        text-align: center;
    }
    .content{
        width: 80%;
        padding: 10px;
        margin: 40px auto 40px auto;
        background: #efefef;
    }
</style>
