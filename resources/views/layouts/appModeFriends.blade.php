<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Gemo</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/styleGemo.css') }}">
    <link rel="stylesheet" href="{{ asset('css/dashnordstyle.css') }}">
    <link rel="stylesheet" href="styleLog.css">
    <link rel="stylesheet" href="styleReg.css">
    <link rel="stylesheet" href="{{ asset('styleDetails.css') }}">
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

                <div class="nav-item dropdown" id="categoriesnav" style="width:10px">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Categories
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="{{route('Categories')}}">Action</a>
          <a class="dropdown-item" href="{{route('Categories')}}">Fantasy</a>
          <div class="dropdown"></div>
          <a class="dropdown-item" href="{{route('Categories')}}">Adventure</a>
        </div>
    </div>
                <form action="">
            <input type="text" placeholder="Search">
            <button><i class="material-icons">search</i></button>
        </form>

        

        
   
        
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
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                        
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('profile') }}">
                                             {{ __('Profile') }}
                                    </a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                            
                        @endguest
                    </ul>
                </div>
            </div>

            
        </nav>
        
        <div class="containerAside">
        <nav>
        @guest
          <div class="side_navbar">
            <a href="{{route('Main')}}" class="active">Magasin</a>
            <a href="{{route('Chat')}}">Chat</a>
            <a href="{{route('login')}}">Pakcs</a>  
            <a href="#" onclick="event.preventDefault(); ShowLoginMode()">Mode Friends</a>      

            <div class="links">
              <a href="{{route('creator.dashboard.login')}}" class="Creator">Creator Mode</a>
            </div>
          </div>

          @else

          <div class="side_navbar">
            <a href="{{route('Main')}}" class="active">Magasin</a>
            <a href="{{route('Chat')}}">Chat</a>
            <a href="{{route('packs')}}">Pakcs</a>
            <a href="{{route('library')}}">Library</a>
            <a href="#" onclick="event.preventDefault(); ShowLogin()">Mode Friends</a>

            <div class="links">
              <a href="{{route('creator.dashboard.login')}}" class="Creator">Creator Mode</a>
            </div>
          </div>
          @endguest
        </nav>
        <div class="main-body">
          
        </div>     
      </div>

      </div>
<!-- ----------------------------------------------- -->
        <div class="cartTab">
      <h1>Shopping Cart</h1>
      <div class="listCart">
          
      </div>
      <div class="btn">
          <button class="close">CLOSE</button>
          <button class="checkOut">Check Out</button>
      </div>
  </div>


  <!-------------------Login PopUp----------------------->
<!-------------------Mode Friends PopUp----------------------->
<div class="login_popup" >
  <div class="login">
    <form action="">
      <fieldset>
       
       <div class="mb-4">
  <label for="ModeFriendsPin" class="form-label">Mode Friends Pin</label>
  <input type="text" class="form-control" id="ModeFriendsPin" readonly value="">
</div>
        <div class="form-check">
  <input class="form-check-input" type="checkbox" value="" id="EtatModeFriends">
  <label class="form-check-label" for="EtatModeFriends">
  Etat Mode Friends
  </label>
</div>
        <button type="submit"><a href="#">Submit</a></button>
      </fieldset>
    </form>
  </div>

</div>

</div>

@guest
<!-------------------Mode Friends lOGIN----------------------->
<div class="login_popupMode" >
  <div class="loginMode">
    <form action="{{route('Modefriendsauth')}}" method="post">
        @csrf
      <fieldset>
       
       <div class="mb-4">
  <label for="Username" class="form-label">Username</label>
  <input type="text" class="form-control" id="ModeFriendsPin" name ="Username"  value="">
</div>
        <div class="form-check">
  
  <label class="form-check-label" for="EtatModeFriends">
  Etat Mode Friends
  </label>
  <input class="form-check-input" type="password" value="" id="EtatModeFriends" name="Pin">
</div>
        <button type="submit" style="color:White;">Submit</button>
      </fieldset>
    </form>
  </div>

</div>

</div>
@endguest
        <main class="py-4">
            @yield('content')
        </main>
    </div>


    <!-- ------------------FOOTER------------------------- -->
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
    
        let iconCart = document.querySelector('.icon-cart');
        let body = document.querySelector('body');
        let closeCart = document.querySelector('.close');


     

        iconCart.addEventListener('click', () => {
            body.classList.toggle('showCart');

        });

        closeCart.addEventListener('click', () => {
            body.classList.toggle('showCart');
            
        });

            let login = document.querySelector(".login_popup");
        let hidelogin = document.querySelector(".Hidelogin");
        let loginMode = document.querySelector(".login_popupMode");
        let hideloginMode = document.querySelector(".HideloginMode");

        function ShowLogin() {
    if(login){
        login.classList.add("active");
    // hidelogin.style.cssText="display:block;";
    }
    

}

function ShowLoginMode() {
    if(loginMode){
        loginMode.classList.add("active");
    // hidelogin.style.cssText="display:block;";
    }
    

}

login.addEventListener('click',function HideLogin(event) {

        if(login){
            if(event.target===login){
        login.classList.remove("active");
        // hidelogin.style.cssText="display:none;";
        console.log("Clicked");
    }
        }
    
   
});

loginMode.addEventListener('click',function HideLogin(event) {

if(loginMode){
    if(event.target===loginMode){
loginMode.classList.remove("active");
// hidelogin.style.cssText="display:none;";
console.log("Clicked");
}
}


});

        
function redirect()
{

    window.location.href='{{route('packs')}}';

}
       
    
</script>

@yield('scripts')
</body>
</html>
