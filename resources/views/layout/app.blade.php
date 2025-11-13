<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard')</title>
    <style>
        body { font-family: sans-serif; margin: 20px; }
        .container { max-width: 1200px; margin: auto; }
        .alert-success { color: green; }
        .alert-danger { color: red; }
        /* Add more basic styling as needed */
    </style>
</head>
<body>
    <div class="container">
        <h1>@yield('header')</h1>
        
        @if (session('success'))
            <div class="alert-success">
                {{ session('success') }}
            </div>
        @endif

        @yield('content')
    </div>
</body>
</html>