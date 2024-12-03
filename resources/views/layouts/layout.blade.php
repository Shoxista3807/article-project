<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>{{ $title }}</title>
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900" rel="stylesheet" />

    <link href="/css/default.css" rel="stylesheet" />
    <link href="/css/fonts.css" rel="stylesheet" />
    <link href="/css/header.css" rel="stylesheet" />

    @yield ('head')

</head>

<body>
    {{ $slot }}
</body>

</html>
