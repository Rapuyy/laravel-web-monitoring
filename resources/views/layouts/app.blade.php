<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>
        @yield('title')
    </title>
    <link rel="stylesheet" href={{ url('/css/app.css') }}>
    <!-- Custom CSS -->
    @yield('css')
</head>
<body>
    <!-- Navbar otw buat -->

    <!-- Content -->
    <main class="py-4">
        @yield('content')
    </main>

    <!-- Footer -->
 
<!-- Custom Javascript -->
@yield('js')
</body>
</html>