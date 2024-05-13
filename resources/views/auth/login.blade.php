@extends('layouts.app')

@section('content')

<div class="Lcontainer" id="Lcontainer">
        <div class="form-Lcontainer sign-in">


            <form  method="POST" action="{{ route('login') }}">
                @csrf
                <div class="LogoSign">
                  <img src="Images/gemo.png" alt="">
                </div>

                <h3>Sign In</h3>


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
                

              



                <button type="submit" class="btn btn-primary " style="margin-top:20px;">
                                    {{ __('Login') }}
                                </button>

                                


                
            </form>
        </div>
        <div class="toggle-Lcontainer">
            <div class="toggle">
                <div class="toggle-panel toggle-right">
                  <img src="Images/WhatsApp Image 2024-04-09 at 15.29.20.jpeg" alt="">
                </div>
            </div>
        </div>
    </div>

    @endsection