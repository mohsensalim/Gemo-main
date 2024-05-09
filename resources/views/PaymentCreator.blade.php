@extends('Creator.layouts.app')

@section('content')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<div class="paypagecon">  

<div class="paycontainer">
        <div class="title">
            <h4>Select a <span style="color: #00b7ff">Payment</span> method</h4>
        </div>

        <form action="#" >
           
            <div class="category">
                
                <label class="mastercardMethod" >
                    <div class="imgName" style="margin-left:20px;">
                        <div class="imgpaycontainer mastercard">
                            <img src="Images/bnk.png" alt="">
                        </div>
                        
                        <span class="namebank">Bank</span>
                    </div>
                    
                </label>

                <label class="paypalMethod">
                    <div class="imgName">
                        <div class="imgpaycontainer paypal">
                            <img src="https://i.ibb.co/KVF3mr1/paypal.png" alt="">
                        </div>
                        <span class="name">Paypal</span>
                    </div>
                    
                </label>

                
            </div>
        </form>
    </div>
 



    <div class="paypalcontainer">
      <div class="paypalcontent">
        <img src="Images/paypal.png" alt="paypal" class="logo" />
        <form action="{{ route('paymentcreator', ['regestiredid' => $creatorid]) }}" method="post">
            @csrf
            <input type="text" hidden value="Paypal" name="P">
          <input type="email" class="input" placeholder="Email" name="paypalemail"/>
          <button class="next__btn" type="submit">Next</button>
        </form>
      </div> 
    </div>

    <div class="bankcontainer">
      <div class="bankcontent">
        <img src="Images/bnk.png" alt="bank" class="logo" />
        <form action="" method="post">
        @csrf
        <input type="text" hidden value="Bank" name="B">
          <input type="text" name="bankname" class="input" placeholder="Bank Name"/>
          <input type="text" name="rip" class="input" placeholder="Rip"/>
          <button class="next__btn" type="submit">Next</button>
        </form>
      </div> 
    </div>
    </div> 
@endsection

@section('scripts')
<script>

document.addEventListener('DOMContentLoaded', function () {
            const bankMethod = document.querySelector('.mastercardMethod');
            const paypalMethod = document.querySelector('.paypalMethod');
            const bankContainer = document.querySelector('.bankcontainer');
            const paypalContainer = document.querySelector('.paypalcontainer');

            bankMethod.addEventListener('click', function () {
                bankContainer.classList.add('active');
                paypalContainer.classList.remove('active');
            });

            paypalMethod.addEventListener('click', function () {
                paypalContainer.classList.add('active');
                bankContainer.classList.remove('active');
            });
        });




</script>


@endsection