<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">

    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="description" content="@yield('meta_description')" />
    <meta name="robots" content="index, follow" />
    <meta property="og:image" content="@yield('picture')" />
    <meta property="og:title" content="@yield('title')" />
    <meta property="og:description" content="@yield('description')" />
    <title>@yield('title')</title>
    <link href="/css/bootstrap.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,200,300,100,500,600,700,800,900'
          rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Playball' rel='stylesheet' type='text/css'>
</head>
<body>
<div class="container">

    @include('pages.errors')

    @yield('content')

</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>
<script src="//yastatic.net/es5-shims/0.0.2/es5-shims.min.js"></script>
<script src="//yastatic.net/share2/share.js"></script>

</body>
</html>