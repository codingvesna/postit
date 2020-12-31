<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="css/app.css" rel="stylesheet"/>
    <title>Postit</title>
</head>
<body class="bg-gray-200">
    <nav class="p-6 bg-white flex justify-between mb-3">
        <ul class="flex items-center">
            <li><a href="#" class="p-3"> Home</a></li>
            <li><a href="#" class="p-3"> Dashboard</a></li>
            <li><a href="#" class="p-3"> Post</a></li>
        </ul>

        <ul class="flex items-center">

            @auth
                <li><a href="#" class="p-3"> Vesna Milovanovic</a></li>
                <li><a href="#" class="p-3"> Logout</a></li>
            @endauth
            @guest
                <li><a href="{{ route('register') }}" class="p-3"> Register</a></li>
                <li><a href="{{ route('login') }}" class="p-3"> Log In</a></li>
            @endguest



        </ul>
    </nav>
    @yield('content')
</body>
</html>
