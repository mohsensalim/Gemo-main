@extends('layouts.app')

@section('content')

<!-- Games------------------------------------------------------------- -->
<section class="CardCategories">
@foreach($games as $game)


<div class="videos-container">
<div class="video">
  <div class="thumbnail">
  <img src="data:image/jpeg;base64,{{ base64_encode($game->Main_Picture) }}" >
  </div>
  <div class="video-details">
    <div class="title">
      <a href="" class="video-title">
        {{$game->Title}}
      </a>
      
      <div class="Game_Buttons">
        <button class="Download" onclick="window.location.href = '{{$game->Download_Path}}';"><a href="{{$game->Download_Path}}">Download</a></button>
      </div>
    </div>
  </div>

</div>
</div>

@endforeach
</section>

@endsection


