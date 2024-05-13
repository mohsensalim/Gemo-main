@extends('Creator.layouts.app')

@section('content')
<div class="Lcontainer" id="Lcontainer">
        <div class="form-Lcontainer sign-in">


            <form  method="POST" action="{{ route('creator.dashboard.check') }}">
                @csrf
                <div class="creatorLogoSign">
                <img src="{{ asset('Images/gemo.png') }}" >
                </div>

                <h3>Creator Sign In</h3>


              <!-- email -->
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Email" required autocomplete="email" autofocus>
                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror


                <!-- password--------- -->

                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Password" required autocomplete="current-password">

                @error('password')
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                         </span>
                                @enderror
                

                <!-- REMEMEBER---------------------------------------- -->
               

                <button type="submit" class="btn btn-primary " style="margin-top:20px;">
                                    {{ __('Login') }}
                                </button>

                               


                
            </form>
        </div>
        <div class="toggle-Lcontainer">
            <div class="toggle">
                <div class="toggle-panel toggle-right" style="width:250px;">
                  <img src="{{ asset('Images/CL.png') }}" alt="">
                </div>
            </div>
        </div>
    </div>
@endsection
