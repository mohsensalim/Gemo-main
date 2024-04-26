@extends('Creator.layouts.app')

@section('content')

<div class="content-area">
    <aside>
        <nav>
          <a href="" class="nav-link active" data-target="dashboardContainer">
            <i class="material-icons">dashboard</i>
            <span id="active-span">Dashboard</span>
          </a>

          <a href="" class="nav-link"  data-target="publishContainer">
            <i class="material-icons">publish</i>
            <span id="active-span">Publish</span>
          </a>

          <a href="" class="nav-link" data-target="paymentContainer" >
            <i class="material-icons">payments</i>
            <span id="active-span">Payments</span>
          </a>

          <a href="" class="nav-link" data-target="paymentContainer" >
            <i class="material-icons">info</i>
            <span id="active-span">Pay Info</span>
          </a>

          <a href="" class="nav-link" data-target="supportContainer">
            <i class="material-icons">support_agent</i>
            <span id="active-span">Support</span>
          </a>

          <a href="" class="nav-link" data-target="privacyContainer">
            <i class="material-icons">verified_user</i>
            <span id="active-span">Privacy</span>
          </a>


        </nav>


    </aside>
    <main>
  <!-- //---------------------------------Publish------------------------------------// -->
      <div class="publishcontainer content-section" id="publishContainer">
    <form  method="post" enctype="multipart/form-data" id="uploadForm" >
        
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
        <input type="url" id="download_path" name="download_path" placeholder="Game Download Link">
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

        <input type="submit" class="btn btn-primary" name="ajouter" value="Submit" style="position:relative; right:40px;"><br>
    </form>
</div>

<!-- //---------------------------------Dashboard Default------------------------------------// -->
<div class="containerCat content-section" id="dashboardContainer">
 
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
    <!-- ---------------------------------No Application Added-------------------------------------->

    <div class="noappaddedcontainer">
    <div class="noappadded">

    <h3>No Games Added</h3>

  </div>

    </div>



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
            <tr>
            

            </tr>
          </tbody>
        </table>


      </div>

<!----------------------------------------------PaymentInfo--------------------------------------------------- -->

<div class="payinfocontainer">
      <div class="payinfocontent">
        <form action="">
          <input type="text" name="modepaiment" class="input" placeholder="Mode Paiment"/>
          <input type="text" name="identifier" class="input" placeholder="Identifier"/>
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
document.addEventListener('DOMContentLoaded', function() {
    let CreatorDahs = document.querySelector(".containerAsideCreator");
    if (CreatorDahs) {
        CreatorDahs.style.display = 'none';
    }
});


//         document.addEventListener('DOMContentLoaded', function() {
//     const navLinks = document.querySelectorAll('.nav-link');
//     const contentSections = document.querySelectorAll('.content-section');

//     navLinks.forEach(link => {
//         link.addEventListener('click', function(event) {
//             event.preventDefault();
//             const targetId = this.getAttribute('data-target');

//             // Hide all content sections
//             contentSections.forEach(section => {
//                 section.style.display = 'none';
//             });

//             // Show the selected content section
//             document.querySelector(`.${targetId}`).style.display = 'block';
//         });
//     });
// });

</script>
@endsection