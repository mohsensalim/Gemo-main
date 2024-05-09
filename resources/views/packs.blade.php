@extends('layouts.app')

@section('content')

<!-- videos------------------------------------------------------------- -->

<section class="CardCategories">

@if(session('success'))
    <div class="alert alert-success" style="width:100%">
        {{ session('success') }}
    </div>
    @endif
    @if(session('error'))
    <div class="alert alert-danger" style="width:100%">
        {{ session('error') }}
    </div>
    @endif
    

    @foreach($packs as $pack)
    @if($pack->Etat_Pack == 'actif')
<div class="videos-container">
<div class="pack">
  <div class="thumbnail">
    <img src="data:image/jpeg;base64,{{ base64_encode($pack->Pack_Picture) }}">
  </div>

  <div class="video-details">
    <div class="title">
      <a href="" class="video-title">
        {{$pack->Nom_Pack}}
        <span style="color: #0ee1e8; font-weight: 800; margin-left: 5px;">{{$pack->Prix_Pack}} <span style="color: gray; font-weight: 600;">GCOIN</span></span>
      </a>
      
      <div class="Game_Buttons">
        <form action="{{route('payment', $pack->Id_Pack)}}" method="post">
          @csrf
        <input  name="amount" hidden value="{{$pack->Prix_Pack}}">
        <input  name="Pack_Coins" hidden value="{{$pack->Pack_Coins}}">
        <button class="Buy" type="submit">Buy Now</button>
        <button class="Add"><a href="#">Add To Card</a></button>
        </form>
      
      </div>
    </div>
  </div>

</div>
</div>
@endif  
@endforeach
</section>

@endsection