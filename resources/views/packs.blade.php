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
    
<div class="videos-container">
<div class="pack">
  <div class="thumbnail">
    <img src="Images/Epic.png">
  </div>

  <div class="video-details">
    <div class="title">
      <a href="" class="video-title">
        FIFA 2022
      </a>
      
      <div class="Game_Buttons">
        <form action="{{route('payment')}}" method="post">
          @csrf
        <input  name="amount" hidden value="100">
        <button class="Buy" type="submit"><a type="submit">Buy Now</a></button>
        <button class="Add"><a href="#">Add To Card</a></button>
        </form>
      
      </div>
    </div>
  </div>

</div>
</div>



<div class="videos-container">
<div class="pack">
  <div class="thumbnail">
    <img src="Images/Elite.png">
  </div>
  
  <div class="video-details">
    <div class="title">
      <a href="" class="video-title">
        FIFA 2022
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
<div class="pack">
  <div class="thumbnail">
    <img src="Images/Master.png">
  </div>
  
  <div class="video-details">
    <div class="title">
      <a href="" class="video-title">
        FIFA 2022
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
<div class="pack">
  <div class="thumbnail">
    <img src="Images/Glory.png">
  </div>
  
  <div class="video-details">
    <div class="title">
      <a href="" class="video-title">
        FIFA 2022
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
<div class="pack">
  <div class="thumbnail">
    <img src="Images/Legend.png">
  </div>
  
  <div class="video-details">
    <div class="title">
      <a href="" class="video-title">
        FIFA 2022
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
<div class="pack">
  <div class="thumbnail">
    <img src="Images/Royal.png">
  </div>
  
  <div class="video-details">
    <div class="title">
      <a href="" class="video-title">
        FIFA 2022
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