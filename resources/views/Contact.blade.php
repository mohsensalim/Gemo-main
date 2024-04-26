@extends('layouts.app')

@section('content')

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

            <input type="submit" id ="contactsubmit" name="SubmitSupport" value="submit">

  </form>
</div>
@endsection