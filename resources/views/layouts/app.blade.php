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
    <link rel="icon"  href="{{ asset('images/icon.png') }}">
    <link rel="stylesheet" href="{{ asset('styleDetails.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
       
   

    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
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
        <a class="nav-link dropdown-toggle categories" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Categories
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="{{route('Categories')}}">Action</a>
          <a class="dropdown-item" href="{{route('Categories')}}">Fantasy</a>
          <div class="dropdown"></div>
          <a class="dropdown-item" href="{{route('Categories')}}">Adventure</a>
        </div>
    </div>
                <form action="" class="searchbar" id="search">
            <input type="text" placeholder="Search">
            <button><i class="material-icons">search</i></button>
        </form>

        

        <div class="header-icons">
          <div class="icon-cart">
            <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 20">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 15a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm0 0h8m-8 0-1-4m9 4a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm-9-4h10l2-7H3m2 7L3 4m0 0-.792-3H1"/>
            </svg>
            <span>0</span>
        </div>
        </div>
        @guest
        
<!--        
        <img src="Images/GCOIN.png" alt="">
        <a href="" class="left"><img src="Images/add.png" alt=""></a>
        <h5 class="guesth5">1000</h5> -->
    @else
    <div class="coindiv">
    <img  src="{{asset('Images/GCOIN.png')}}" alt="" >
        <a  class="notguestaddimg"><img src="{{asset('Images/add.png')}}" alt="" onclick="redirect()" style="cursor:pointer;"></a>
        <h5 class="notguesth5" >{{ Auth::user()->Coins }}</h5>
    @endguest
   
        </div>
                <button class="navbar-toggler {{ Auth::check() ? 'notguest-collapse' : 'guest-collapse' }}" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
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
                        
                            <li class="nav-item dropdown username">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>
                                
                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                              
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                                <div class="nav-item dropdown" id="categoriesnavrespo" style="width:10px">
                                    <a class="nav-link dropdown-toggle categories" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Categories
                                    </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="{{route('Categories')}}">Action</a>
          <a class="dropdown-item" href="{{route('Categories')}}">Fantasy</a>
          <div class="dropdown"></div>
          <a class="dropdown-item" href="{{route('Categories')}}">Adventure</a>
        </div>
    </div>
                                <div class="asiderespo">
                                <a href="{{route('Main')}}" class="active">Magasin</a>
                                <a href="{{route('Chat')}}">Chat</a>
                                 <a href="{{route('packs')}}">Pakcs</a>
                                <a href="{{route('library')}}">Library</a>
                                <a href="#" onclick="event.preventDefault(); ShowLogin()">Mode Friends</a>
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
@guest

@else
        <div id="body">
        <div class="cartTab">
      <h1>Shopping Cart</h1>
      <div class="listCart">
          <div class="gamecard">
          @if(isset($gamecart))
          @foreach($gamecart as $game)
          <div class="containerCatcard" id="{{ $game->IDG }}">
          <div class="sub_containercard">
          <h3>{{$game->Title}}</h3>
          <h4>{{$game->Jeux_Prix}} <span>GCOIN</span></h4>
          <div class="image">
          <img src="data:image/jpeg;base64,{{ base64_encode($game->Main_Picture) }}" >
          </div>
          <div class="btns">
                <!-- <form action="{{route('removefromcart',$game->IDG)}}" method="post" style="display:inline;">
                @csrf
                    @method('DELETE') -->
              <button id="card" onclick="deletefromcart({{$game->IDG}})" data-gameid="{{$game->IDG}}">Remove</button>
              <!-- </form> -->
              <form action="{{route('gamedetails', $game->IDG)}}" method="get" style="display:inline;">
              <button id="buy" type="submit">Buy</button>
              </form>
          </div>
          </div>
       
       </div>
 
          @endforeach
         
          
     

    @endif





          </div>

      </div>
      <div class="btn">
          <button class="close">CLOSE</button>
          
      </div>
  </div>
  </div>
 @endguest

  <!-------------------Login PopUp----------------------->
<!-------------------Mode Friends PopUp----------------------->
<div class="login_popup" >
  <div class="login">
    <form action="{{route('modefriandsstatue')}}" method="post">
        @csrf
      <fieldset>
       
       <div class="mb-4">
  <label for="ModeFriendsPin" class="form-label">Mode Friends Pin</label>
  <input type="text" class="form-control" id="ModeFriendsPin" name = "Pin" readonly value="{{ isset($Pin) ? $Pin : '' }}">
</div>
        <div class="form-check">
  <input class="form-check-input" type="checkbox" value="" id="EtatModeFriends" name="etatmode">
  <label class="form-check-label" for="EtatModeFriends">
  Etat Mode Friends
  </label>
</div>
        <button type="submit" style="color:white;">Submit</button>
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
let check =false;

// Get the element you want to check
var element = document.querySelector(".navbar-collapse");
var button = document.querySelector(".navbar-toggler");
var form = document.querySelector("#search");

button.addEventListener('click', () => {


    setTimeout(function() {
        var style = window.getComputedStyle(element);
if (style.display === "none") {
    form.style.left = "4px";
} else {
    form.style.left = "500px";
}
    }, 20); // 2 seconds
});



   
        



        let iconCart = document.querySelector('.icon-cart');
        let body = document.querySelector('#body');
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

////////////////////// Remove Game From Cart /////////////////////////
    
function deletefromcart(id)
{
    console.log('Deleting item with ID:', id);
    $.ajax({

        url:'/removefromocart/'+id,
        type:'DELETE',
        data:{
            _token: "{{ csrf_token() }}"
            
        },

        success:function(response)
        {
           
            
            if (response == 'success') {
                // Remove the game card from the UI
                $('#' + id).remove();
                
            } else {
                // Display error message
                alert(response.error); // You can replace this with your preferred way of displaying messages
            }
        },
        error: function(xhr, status, error) {

// Display error message

console.log('Error: ' + error.message);

}

    });

}


////////////////////////////// add to cart ///////////////////////////////////////////////////


function addtocart (id)
{
   
    $.ajax({

url:'/addtocart/' + id,
  dataType: 'json',
type:'POST',
headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
data:{

    _token: "{{ csrf_token() }}",
    
},

success:function(response)
{
   
    
    if (response.success) {
        check=true;

    
        // Remove the game card from the UI
        console.log('jsfslk');
        console.log(response.game);
        var gameImageData = response.game.Main_Picture; // Assuming this is the base64 encoded image data
        var gameImageSrc = 'data:image/jpeg;base64,' + gameImageData;
        var gameCard = `<div class="containerCatcard" id="${response.game.IDG}">


<div class="sub_containercard">


    <h3>${response.game.Title}</h3>


    <h4>${response.game.Jeux_Prix} <span>GCOIN</span></h4>


    <div class="image">


      
    <img src="${gameImageSrc}" alt="Game Image">


    </div>


    <div class="btns">


        <button id="card" onclick="deletefromcart(${response.game.IDG})" data-gameid="${response.game.IDG}">Remove</button>
        <form action="gamedetails/${response.game.IDG}" method="get" style="display:inline;">
              <button id="buy" type="submit">Buy</button>
              </form>

    </div>


</div>


</div>`;


$('.gamecard').append(gameCard);
        
        
    } 

    if(response.fail)
    {
        // document.getElementById('error-message').textContent = 'You have already added Or Purchased this game';
        var error = `<div class="alert alert-danger" id="errorcontent">You have already added Or Purchased this game</div>`;
        $('#fail').append(error);

        setTimeout(function() {
            $('#errorcontent').remove();
    }, 2000); // 2000 milliseconds = 2 seconds
        
    }


},
error: function(xhr, status, error) {

// Display error message
console.log("qlkdqskljl");
console.log('Error: ' + error.message);

}

});

}




function getcart()
{


    $.ajax({

url:'/',
type:'Get',
data:{
    _token: "{{ csrf_token() }}"
    
},

success:function(response)
{
   
    
    console.log(response);
},
error: function(xhr, status, error) {

// Display error message

console.log('Error: ' + error.message);

}

});


}



$(document).ready(function() {
    $.ajax({
        type: 'GET',
        url: '/getcart',
        success: function(data) {
            // Handle the data returned from the server
            console.log('data');
            console.log(data);
        },
        error: function(xhr, status, error) {
            // Handle errors
            console.error(xhr.responseText);
        }
    });
});



</script>

@yield('scripts')
</body>
</html>
