<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>
        @yield('title')
    </title>
    <link rel="stylesheet" href="{{ url('/css/app.css') }}">
    <link rel="icon" href="{{ url('/images/its.png') }}">

    <style>
      body{ height:100vh; margin:0; }

      header{ min-height:50px; background:lightcyan; }
      footer{ min-height:50px; background:PapayaWhip; }

      /* Trick */
      body{ 
        display:flex; 
        flex-direction:column; 
      }

      footer{
        margin-top:auto; 
      }
    </style>
    <!-- Custom CSS -->
    @yield('css')
</head>
<body @if(Request::path() === 'camera') onload="openSocket()" @endif>
    <!-- Navbar otw buat -->
    <div class="article">
      <nav class="main-header navbar navbar-expand-md navbar-light navbar-white bg-primary">
          <div class="container">
            <a href="/" class="navbar-brand">
              <img src="{{ url('images/logo.png') }}" class="brand-image img-circle elevation-3" width="50px" height="50px" style="opacity: .8">
              <span class="brand-text font-weight-light">CCTV Monitoring</span>
            </a>
     
            <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse order-4" id="navbarCollapse">
              <!-- Left navbar links -->
              <ul class="navbar-nav">
                <li class="nav-item">
                  <a href="/" class="nav-link">Home</a>
                </li>
                <li class="nav-item">
                  <a href="{{ route('camera') }}" class="nav-link">Camera</a>
                </li>
                <li class="nav-item">
                  <a href="{{ route('user.index') }}" class="nav-link">Manajemen Pengguna</a>
                </li>
                @auth
                <li class="nav-item">
                  <a href="{{ route('logout') }}" class="nav-link">Logout</a>
                </li>
                @endauth
              </ul>
  
            </div>
          </div>
        </nav>
    </div>
    <!-- Random Content -->
    @yield('random')

    <!-- Content -->
    <main class="py-4">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-primary text-center text-lg-start">
      <!-- Copyright -->
      <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
        © 2021 Copyright
      </div>
      <!-- Copyright -->
    </footer>
 
<!-- Custom Javascript -->
@yield('js')
</body>
</html>