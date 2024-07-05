<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Gemo Creator Mode</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/styleGemo.css') }}">
    <link rel="stylesheet" href="{{ asset('css/dashnordstyle.css') }}">
    <link rel="stylesheet" href="{{ asset('styleLog.css') }}">
    <link rel="stylesheet" href="{{ asset('styleReg.css') }}">
    <link rel="stylesheet" href="{{ asset('stylePaymentCreator.css') }}">
    <link rel="icon"  href="{{ asset('images/icon.png') }}">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <link href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" />

    @livewireStyles

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <div id="app">
        <div class="NavContainer">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm" id="nav">
            <div class="container">
           
                <a  href="{{ url('/') }}" id="logoimg">
                <img src="{{ asset('Images/gemo.png') }}" >
                </a>
                <form action="">
            <input type="text" placeholder="Search">
            <button><i class="material-icons">search</i></button>
        </form>

        <div class="header-icons">
          <div class="icon-cart">
        </div>
        
        </div>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>
                
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest('creator')
                            @if (Route::has('login'))
    
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('creator.dashboard.login') }}">{{ __('Login') }}</a>
                                </li>
                               
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('creator.dashboard.register') }}">{{ __('Register') }}</a>
                                   
                                </li>
                            @endif
                        @else
                      
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                              
                                {{ Auth::guard('creator')->user()->name }}
                                    
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                               
                                    <a class="dropdown-item" href="{{ route('creator.dashboard.logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('creator.dashboard.logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                            
                        @endguest
                    </ul>
                </div>
            </div>

            
        </nav>

        

      </div>
<!-- ----------------------------------------------- -->
        
        <main class="py-4">
            @yield('content')
        </main>
    </div>


<!-- ------------------------FOOTER-------------------- -->
    <footer>
    <div class="left">
<a href="{{route('contact')}}">Contact Us </a> <span> | </span> <a href="{{route('Main')}}">GEMO</a>
</div>
<div class="right">© 2024 Gemo | All Rights Reserved</div>
</footer>
    
    @livewireScripts
    
   
   
<script>

// let CreatorDahs = document.querySelector(".containerAside");
// let CreatorClick = document.querySelector(".Creator");

// CreatorClick.addEventListener('click', function(event) {
//     event.preventDefault(); // Prevent default link behavior
//     CreatorDahs.style.display = 'none';
// });




//    function scrollDown() {
//          document.getElementById('chat').scrollTop =  document.getElementById('chat').scrollHeight
//         }

//        scrollDown();
document.addEventListener('DOMContentLoaded', function() {
   

    function show(container, event) {
        event.preventDefault();
    let contentSections = document.querySelectorAll('.content-section');
    let c = document.querySelector(container);
    
    // Loop through each content section
    contentSections.forEach(section => {
        // Hide the content section
        section.style.display = "none";
    });

    // Show the specified container
    c.style.display = "block";
}

   

});
       
    
</script>

@yield('scripts')
</body>
</html>
