<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <link rel="stylesheet" href="app.css" />
    <link rel="stylesheet" href="../app.css" />
</head>

<body>
    @yield('content')
</body>

</html>
