@extends('layouts.app')

@if(isset($Pin))
@section('Pin') {{$Pin}} @endsection
@endif


@if(session()->has('gamecart') )
{{$gamecart = session('gamecart')}}

@section('gamecart') {{ $gamecart }} @endsection

@endif

@if(isset($gamescart))
  @section('gamecart') {{ $gamecart=$gamescart }} @endsection
@endif


@section('content')

<div id="main">
@if(session('error'))
    <div class="alert alert-danger" style="width:100%; margin-top:30px;">
        {{ session('error') }}
    </div>
    @endif

   <div id="fail" style="width:100%; margin-top:30px; position:fixed; z-index:2;">

   </div>

    @if(session('success'))
    <div class="alert alert-success" style="width:100%; margin-top:30px;">
        {{ session('success') }}
    </div>
    @endif

      <div class="containere">
          <div class="slide">
              <div class="item"
                  style="background-image: url({{ asset('ImagesSlider/VL.png') }})">

                  <div class="content">
                      <div class="name">Valorant</div>
                      <div class="desc">Dive into the tactical world of Valorant, a fast-paced 5v5 tactical shooter where precise aim and strategic teamwork are key. Choose from a diverse cast of agents, each with unique abilities, and engage in intense, competitive matches. With its blend of precise gunplay and strategic abilities, Valorant offers thrilling gameplay experiences that keep players on the edge of their seats.
                      </div>
                      <button>More Info </button>
                  </div>
              </div>

              <div class="item"
                  style="background-image: url({{ asset('ImagesSlider/fifa.png') }});">

                  <div class="content">
                      <div class="name">Fifa 2021</div>
                      <div class="desc">Experience the pinnacle of soccer gaming with FIFA 21. Immerse yourself in realistic gameplay, enhanced graphics, and exciting new features like Volta Football. Lead your favorite teams to victory and write your own story of soccer glory on the virtual pitch.
                      </div>
                      <button>More Info</button>
                  </div>
              </div>

              <div class="item"
                  style="background-image: url({{ asset('ImagesSlider/CNTR.png') }});">

                  <div class="content">
                      <div class="name">Counter Strike 2</div>
                      <div class="desc">Counter Strike 2 (CS2) delivers heart-pounding tactical gameplay in intense team-based battles. With enhanced graphics and refined mechanics, immerse yourself in the ultimate FPS experience. Team up with friends, strategize, and dominate the competition in thrilling multiplayer matches.
                      </div>
                      <button>More Info</button>
                  </div>
              </div>

              <div class="item"
                  style="background-image: url({{ asset('ImagesSlider/F.png') }});">

                  <div class="content">
                      <div class="name">Far Cry 6</div>
                      <div class="desc">Embark on a thrilling journey to the lush and chaotic world of Yara in Far Cry 6. Lead a revolution against a ruthless dictator and forge your path to freedom through intense guerrilla warfare. With stunning visuals, dynamic gameplay, and a gripping narrative, Far Cry 6 offers an unforgettable experience of adventure and rebellion in a vibrant open-world setting.
                      </div>
                      <button>More Info</button>
                  </div>
              </div>

              <div class="item"
                  style="background-image: url({{ asset('ImagesSlider/GT.png') }});">

                  <div class="content">
                      <div class="name">Grand Theft Auto V</div>
                      <div class="desc">Step into the sprawling, open-world playground of Los Santos in Grand Theft Auto V. Explore a richly detailed world filled with crime, adventure, and opportunity. Whether you're engaging in thrilling heists, causing chaos in the streets, or simply enjoying the sights, GTA V offers endless entertainment and excitement for players to enjoy.

                      </div>
                      <button>More Info</button>
                  </div>
              </div>
              
          </div>
          <div class="butto">
            <button class="prev" title="Previous"><i class="fa-solid fa-arrow-left"></i></button>
            <button class="next" title="Next"><i class="fa-solid fa-arrow-right"></i></button>
        </div>
      </div>
    </div>
  </div>


<div class="resposlider">
  <base href="https://s3-us-west-2.amazonaws.com/s.cdpn.io/4273/">
<div id="slider">
<figure>
<img src="austin-fireworks.jpg" alt>
<img src="taj-mahal_copy.jpg" alt>
<img src="ibiza.jpg" alt>
<img src="ankor-wat.jpg" alt>
<img src="austin-fireworks.jpg" alt>
</figure>
</div>
</div>

<!-- GAMES------------------------------------------------------------- -->
<div class="MainCat"> Last Added</div>


  <section class="CardContainer">
    @foreach($games as $game)
    @if($game->etat_jeux == 'actif')
        <div class="videos-container">
        <div class="video">
          <div class="thumbnail">
          <img src="data:image/jpeg;base64,{{ base64_encode($game->Main_Picture) }}" >
          </div>
          <div class="video-details">
            <div class="title">
              <a href="{{route('gamedetails', $game->IDG)}}" class="video-title">
              {{$game->Title}} : <span style="color:#0ebfe8;font-size: 20px;font-weight: bold;">{{$game->Jeux_Prix}} <span style="font-size: 17px; font-weight: bold;">GCOIN</span></span>
              </a>
              
              <div class="Game_Buttons">
              
                <button class="Buy" href="{{route('gamedetails', $game->IDG)}}"><a href="{{route('gamedetails', $game->IDG)}}" type="submit">Buy Now</a></button>
                <!-- <form action="{{route('addtocart', $game->IDG)}}" method="post" style="display:inline;"> -->
                <!-- @csrf -->
                <button class="Add"  onclick="addtocart({{$game->IDG}}); getcart();">Add To Card</button>
                <!-- </form> -->
              </div>
            </div>
          </div>

        </div>
</div>
@endif
@endforeach


<div class="videos-container">
        <div class="video">
          <div class="thumbnail">
            <img src="{{ asset('ImagesSlider/F.png') }}">
          </div>
          <div class="video-details">
            <div class="title">
              <a href="" class="video-title">
                Far Cry 6
              </a>
              
              <div class="Game_Buttons">
                <button class="Buy"><a href="#">Buy Now</a></button>
                <button class="Add"><a href="#">Add To Card</a></button>
              </div>
            </div>
          </div>

        </div>
</div>



<div class="videos-container">
        <div class="video">
          <div class="thumbnail">
            <img src="{{ asset('ImagesSlider/Call.png') }}">
          </div>
          <div class="video-details">
            <div class="title">
              <a href="" class="video-title">
               Call Of Duty
              </a>
              
              <div class="Game_Buttons">
                <button class="Buy"><a href="#">Buy Now</a></button>
                <button class="Add"><a href="#">Add To Card</a></button>
              </div>
            </div>
          </div>

        </div>
</div>




<div class="videos-container">
        <div class="video">
          <div class="thumbnail">
            <img src="{{ asset('ImagesSlider/CNTR.png') }}">
          </div>
          <div class="video-details">
            <div class="title">
              <a href="" class="video-title">
                Counter Strike
              </a>
              
              <div class="Game_Buttons">
                <button class="Buy"><a href="#">Buy Now</a></button>
                <button class="Add"><a href="#">Add To Card</a></button>
              </div>
            </div>
          </div>

        </div>
</div>




<div class="videos-container">
        <div class="video">
          <div class="thumbnail">
            <img src="{{ asset('ImagesSlider/GT.png') }}">
          </div>
          <div class="video-details">
            <div class="title">
              <a href="" class="video-title">
                Grand Theft Auto V
              </a>
              
              <div class="Game_Buttons">
                <button class="Buy"><a href="#">Buy Now</a></button>
                <button class="Add"><a href="#">Add To Card</a></button>
              </div>
            </div>
          </div>

        </div>
</div>



<div class="videos-container">
        <div class="video">
          <div class="thumbnail">
            <img src="{{ asset('ImagesSlider/VL.png') }}">
          </div>
          <div class="video-details">
            <div class="title">
              <a href="" class="video-title">
               Valorant
              </a>
              
              <div class="Game_Buttons">
                <button class="Buy"><a href="#">Buy Now</a></button>
                <button class="Add"><a href="#">Add To Card</a></button>
              </div>
            </div>
          </div>

        </div>
</div>
            
</section>
@endsection


@section('scripts')
<script>
let next = document.querySelector(".next")
let prev = document.querySelector(".prev")


next.addEventListener('click', function(){
    let items = document.querySelectorAll('.item')
    document.querySelector('.slide').appendChild(items[0])
    ;
})
prev.addEventListener('click', function(){
    let items = document.querySelectorAll('.item')
    document.querySelector('.slide').prepend(items[items.length - 1])
})

function next1(){
    let items = document.querySelectorAll('.item')
    document.querySelector('.slide').appendChild(items[0])
    
}

setInterval(next1,5000);


</script>

@endsection