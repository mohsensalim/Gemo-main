@extends('layouts.app')

@section('content')

<div class="content-area">
    <aside>
        <nav>
          <a href="" class="nav-link active">
            <i class="material-icons">dashboard</i>
            <span id="active-span">Dashboard</span>
          </a>  

          <a href="" class="nav-link">
            <i class="material-icons">publish</i>
            <span id="active-span">Publish</span>
          </a>

          <a href="" class="nav-link">
            <i class="material-icons">payments</i>
            <span id="active-span">Payments</span>
          </a>

          <a href="" class="nav-link">
            <i class="material-icons">support_agent</i>
            <span id="active-span">Support</span>
          </a>
          
          <a href="" class="nav-link">
            <i class="material-icons">verified_user</i>
            <span id="active-span">Privacy</span>
          </a>

          
        </nav>


    </aside>
    <main>

      <!-- //---------------------------------Publish------------------------------------// -->
      <div class="publishcontainer">
        <form action="" method="post"enctype="multipart/form-data" id="uploadForm">
            <!-- ... Vos champs de formulaire ... -->
            <Label>Title</Label>
            <input type="text" id="Title" name="Title" placeholder="Title" >
            <Label>Game Picture</Label>
            <input type="file" id="photo" name="photo" accept="image/*">
           <Label>Description</Label>
            <textarea name="description" class="form-control"  rows="20" cols="48" placeholder="Description" maxlength="4000"></textarea>
            <Label>Game Screenshots</Label>
            <input type="file" id="Screenshots" name="Screenshots" accept="image/*" multiple="multiple">

            <Label>Upload Game</Label>
            <input type="url" id="game" name="game" placeholder="Game Download Link" >
          <H6 class="Infinitylink"><a href="https//www.infinityfree.com" >If Need An Free Hosting To Upload Your Games</a></H6>
            
            <input type="submit" name="ajouter" value="ajouter"><br>
            <input type="submit" name="rechercher" value="rechercher"><br>
            <input type="submit" name="supprimer" value="supprimer"><br>
            <input type="submit" name="modifier" value="modifier"><br>
        </form>
      </div>
<!-- //---------------------------------Dashboard Default------------------------------------// -->
        <div class="containerCat">
          <div class="sub_container">
          <h3>FIFA 2024</h3>
          <div class="categories">
              <h1>FPS</h1>
          </div>
          <div class="game_users">
           <h5>1000 User</h5> 
          </div>
          <div class="time_system">
              <h1>Jul 8.2013</h1>
              <i class="fa-brands fa-windows" style="color: #19191a;"></i>
              <i class="fa-brands fa-apple" style="color: #19191a;"></i>
              <i class="fa-brands fa-android" style="color: #19191a;"></i>
          </div>
          <div class="image">
              <img src="{{ asset('Images/5.jpg') }}">
          </div>
          <div class="btns">
              <button id="card"><a href="#">Unpublish</a></button>
              <button id="buy"><a href="#">Edit</a></button>
          </div>
          
      </div>
       
      </div>

<!-- //---------------------------------payment_container------------------------------------// -->

      <div class="payment_container">
        <table>
          <caption>Payments</caption>
          <thead>
            <tr>
              <th scope="col">Approval Date</th>
              <th scope="col">Amount Submited</th>
              <th scope="col">Payment Method</th>
              <th scope="col">Status</th>
              <th scope="col">Facture</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td data-label="Account">Visa - 3412</td>
              <td data-label="Due Date">04/01/2016</td>
              <td data-label="Amount">$1,190</td>
              <td data-label="Period">03/01/2016 - 03/31/2016</td>
              <td><button id="buy"><a href="#">Show Statics</a></button></td>
            </tr>
          </tbody>
        </table>


      </div>
<!-- //---------------------------------Support------------------------------------// -->

<div class="support_container">
  <form action="" method="post"enctype="multipart/form-data" id="supportform">
  <Label>Nom</Label>
            <input type="text" id="Nom" name="Nom" placeholder="Nom" >
            <Label>Prenom</Label>
            <input type="text" id="Prenom" name="Prenom" placeholder="Prenom" >
            <Label>Email</Label>
            <input type="email" id="Email" name="Email" placeholder="Email" >
            <Label>Add Screenshots</Label>
            <input type="file" id="photo" name="photo" accept="image/*">
           <Label>Description</Label>
            <textarea name="Problem" class="form-control"  rows="20" cols="48" placeholder="Problem" maxlength="4000"></textarea>

            <input type="submit" name="SubmitSupport" value="submit">

  </form>
</div>


    </main>

</div>

@endsection

@section('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    let CreatorDahs = document.querySelector(".containerAsideCreator");
    if (CreatorDahs) {
      console.log("hhhhhhhhhhhhhh");
        CreatorDahs.style.display = 'none';
    }
});
</script>
@endsection
