@extends('Creator.layouts.app')

@section('content')

<div class="content-area">
    <aside>
        <nav>
          <button class="nav-link active" data-target="dashboardContainer" onclick="show('.containerDash')"> 
            <i class="material-icons">dashboard</i>
            <span id="active-span">Dashboard</span>
            </button>

            <button class="nav-link" data-target="publishContainer" onclick="show('.publishcontainer')">
  <i class="material-icons">publish</i>
  <span id="active-span">Publish</span>
</button>

<button class="nav-link" data-target="paymentContainer" onclick="show('.payment_container')">
  <i class="material-icons">payments</i>
  <span id="active-span">Payments</span>
</button>

<button class="nav-link" data-target="paymentContainer" onclick="show('.payinfocontainer')">
  <i class="material-icons">info</i>
  <span id="active-span">Pay Info</span>
</button>

<button class="nav-link" data-target="supportContainer">
  <i class="material-icons">support_agent</i>
  <span id="active-span">Support</span>
</button>

<button class="nav-link" data-target="privacyContainer">
  <i class="material-icons">verified_user</i>
  <span id="active-span">Privacy</span>
</button>


        </nav>


    </aside>
    <main>
  <!-- //---------------------------------Publish------------------------------------// -->
      <div class="publishcontainer content-section" id="publishContainer">
    <form  method="post" enctype="multipart/form-data" id="uploadForm" action="{{route('creator.game.store')}}">
        
    @csrf

    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif
    <!-- Your form fields -->
        <Label>Title</Label>
        <input type="text" id="title" name="title" placeholder="Title">
        @error('title')
            <span class="text-danger">{{ $message }}</span>
        @enderror

        <Label>Game Picture</Label>
        <input type="file" id="photo" name="main_picture" accept="image/*">
        @error('photo')
            <span class="text-danger">{{ $message }}</span>
        @enderror

        <Label>Description</Label>
        <textarea name="description" class="form-control" rows="20" cols="48" placeholder="Description" maxlength="4000"></textarea>
        @error('description')
            <span class="text-danger">{{ $message }}</span>
        @enderror

        <Label>Game Screenshots</Label>
        <input type="file" id="screenshots" name="screenshots[]" accept="image/*" multiple="multiple">
        @error('screenshots')
            <span class="text-danger">{{ $message }}</span>
        @enderror

        <!-- and so on for each input field -->

        <div class="pricecreator" style="dipslay:flex;">
            <Label>Game Price</Label>
            <input type="number" name="jeux_prix" id="jeux_prix" step="0.01" min="0" placeholder="Enter amount" style="width:200px;"><span> GCOIN</span>
            @error('jeux_prix')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <select class="form-select" id="categories" required name="category">
            <option selected disabled value="">Choose...</option>
            <option value="Action">Action</option>
            <option value="Fantasy">Fantasy</option>
            <option value="FPS">FPS</option>
        </select>
        @error('categories')
            <span class="text-danger">{{ $message }}</span>
        @enderror

        <Label>Upload Game</Label>
        <input type="url" id="download_path" name="download_path" placeholder="Game Download Link" >
        @error('download_path')
            <span class="text-danger">{{ $message }}</span>
        @enderror

        <H6 class="Infinitylink"><a href="https://www.infinityfree.com">If Need An Free Hosting To Upload Your Games</a></H6>

        <!-- Display validation errors -->
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <input type="hidden" id="errorCount" value="{{ $errors->count() }}">
        <input type="submit" class="btn btn-primary publishbtn" name="ajouter" value="Submit" style="position:relative; right:40px;"><br>
    </form>
</div>



 <!-- ---------------------------------No Application Added-------------------------------------->

 @if($CreatorGames->isEmpty())
    <div class="noappaddedcontainer">
    <div class="noappadded">

    <h3>No Games Added</h3>

  </div>

    </div>
    
@else
<!-- //---------------------------------Dashboard Default------------------------------------// -->
<div class="containerDash content-section" >



  @foreach($CreatorGames as $CreatorGame)
  @php
$installs=0;
@endphp
<div class="containerCat" id="dashboardContainer">
         
          <div class="sub_container">
          <h3>{{$CreatorGame->Title}}</h3>
          <div class="categories">
              <h1>{{$CreatorGame->Category}}</h1>
          </div>
          <div class="game_users">
           
          @foreach($CreatorPurchasedgames as $CreatorPurchasedgame)
          @php
          
          if($CreatorPurchasedgame->IDG == $CreatorGame->IDG)
          {
            $installs= $installs +1;
          }
              
          
          @endphp
          
           @endforeach
           <h5>{{$installs}} User</h5>
          
          </div>
          <div class="time_system">
          
              <h1>{{ $CreatorGame->created_at->format('M j, Y') }}</h1>
          </div>
          <div class="image">
          <img src="data:image/jpeg;base64,{{ base64_encode($CreatorGame->Main_Picture) }}" >
          </div>
          <div class="btns">
              <button id="card"><a href="#">Unpublish</a></button>
              <button id="buy"><a href="#">Edit</a></button>
          </div>

      </div>
      
      </div>
      
      @endforeach


      </div>
   
      @endif

<!-- //---------------------------------payment_container------------------------------------// -->

      <div class="payment_container content-section" id="paymentContainer" style="position:relative; top:100px;" >
      <caption>Payments</caption>

      <table>

          <thead>
            <tr>
              <th scope="col">Approval Date</th>
              <th scope="col">Amount Submited</th>
              <th scope="col">Payment Method</th>
              <th scope="col">Status</th>

            </tr>
          </thead>
          <tbody>
            
            @foreach($creatorpaymenthistory as $creatorpayment)
            <tr>
              @if($creatorpayment->Date_Paiment==null)
            <td scope="col">Not Apprroved Yet</td>
            @else
            <td scope="col">{{$creatorpayment->Date_Paiment}}</td>
            @endif
              <td scope="col">{{$creatorpayment->Amount}}</td>
              <td scope="col">{{$creatorpayment->Mode_Paiment}}</td>
              <td scope="col">{{$creatorpayment->Etat_Paiment}}</td>

            </tr>
            @endforeach
          </tbody>
        </table>


      </div>

<!----------------------------------------------PaymentInfo--------------------------------------------------- -->

<div class="payinfocontainer content-section">
      <div class="payinfocontent">
        <form action="">
          <input type="text" name="modepaiment" class="input" placeholder="Mode Paiment" value="{{$creatorpayinfo->Mode_Paiment}}"/>
          <input type="text" name="identifier" class="input" placeholder="Identifier" value="{{$creatorpayinfo->Identifiant}}"/>
          <button class="next__btn" type="submit">Next</button>
        </form>
      </div>
    </div>
    </div>

    </main>

</div>

@endsection

@section('scripts')
<script>
  console.log(document.getElementById('errorCount').value);
  const errorCount = document.getElementById('errorCount').value;

if (errorCount > 0) {

    // There are validation errors

    show('.publishcontainer');

} else {

    // There are no validation errors

    show('.containerDash');

}

      
      
      
function show(cc){
            const C = document.querySelectorAll('.content-section');
            const CCC = document.querySelector(cc);

      for(var i=0;i<C.length;i++)
    {
        C[i].style.display = 'none';
      }

      CCC.style.display = 'block';
          }

          

        
</script>
@endsection