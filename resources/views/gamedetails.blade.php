@extends('layouts.app')


@section('content')
@if(session('error'))
    <div class="alert alert-danger" style="width:100%; margin-top:30px;">
        {{ session('error') }}
    </div>
    @endif
    @if(session('success'))
    <div class="alert alert-success" style="width:100%; margin-top:30px;">
        {{ session('success') }}
    </div>
    @endif
@if(isset($game))
<div class="DetailsContaier">


    <div class="imgs">
		<div class="Mainimage">
		<img src="data:image/jpeg;base64,{{ base64_encode($game->Main_Picture) }}" >
		</div>

		<div class="images">
		<img src="data:image/jpeg;base64,{{ base64_encode($game->Screen1) }}" >
		<img src="data:image/jpeg;base64,{{ base64_encode($game->Screen2) }}" >
		<img src="data:image/jpeg;base64,{{ base64_encode($game->Screen3) }}" >
		</div>
        </div>


		<div class="details">

		<div class="title">
			<h1>{{$game->Title}}</h1>
			<h1><span style="color:#0ebfe8;font-size: 30px;font-weight: bold;">{{$game->Jeux_Prix}} <span style="font-size: 20px; font-weight: bold;">GCOIN</span></span></h1>
		</div>
		

	

		<div class="description">
			<p> {{$game->Description}}</p>
		</div>

		
			<div class="Game_Buttons">
			<form action="{{route('buygame', $game->IDG)}}" method="post" style="display:inline;">
				@csrf
                <button class="Buy" type="submit">Buy Now</button>
                
              </form>

			  <form action="{{route('addtocart', $game->IDG)}}" method="post" style="display:inline;">
                @csrf
                <button class="Add"  type="submit">Add To Card</button>
                </form>

	</div>
</div>
@else
<div style="height:100vh;">

</div>

@endif


@endsection