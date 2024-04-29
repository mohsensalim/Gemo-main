<?php

namespace App\Http\Controllers;

use App\Models\User;
use Omnipay\Omnipay;
use App\Models\Panierpack;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    //

    private $geteway;



    public function __construct() {
        $this->geteway = Omnipay::create('PayPal_Rest');
        $this->geteway->setClientId(env('PAYPAL_CLIENT_ID'));
        $this->geteway->setSecret(env('PAYPAL_CLIENT_SECRET'));
        $this->geteway->setTestMode(true);

    }


    public function pay(Request $request)
    {
        try {

            $response= $this->geteway->purchase(array(
                'amount' => $request->amount,
                'currency' => env('PAYPAL_CURRENCY'),
                'returnUrl' => url('success'),
                'cancelUrl' => url('error')


            ))->send();


            if($response->isRedirect())
            {

                $response->redirect();


            }
            else{

                return $response->getMessage();
            }


        }
        catch (\Throwable $th){

            return $th->getMessage();

        }



    }

    public function success(Request $request)
    {
        if ($request->input('paymentId') && $request->input('PayerID')) {
            $transaction = $this->geteway->completePurchase(array(
                'payer_id' => $request->input('PayerID'),
                'transactionReference' => $request->input('paymentId')
            ));

            $response = $transaction->send();

            if ($response->isSuccessful()) {

                $arr = $response->getData();


                $lastPanierpack = Panierpack::latest()->first();
                $newId_PP = $lastPanierpack ? $lastPanierpack->Id_PP + 1 : 1;
                Panierpack::create([
                    'Id_PP'=>$newId_PP,
                    'user_id'=>Auth::guard('web')->id(),

                ]);
                

                return redirect()->route('packs')->with('success', 'Payment is Successful. Your Transaction Id is: ' . $arr['id']);

            }
            else{
                return $response->getMessage();
            }
        }
        else{
            return redirect()->route('packs')->with('error', 'Payment declined!!');
          
        }
    }

    public function error()
    {
        return redirect()->route('packs')->with('error', 'User declined the payment!');
        
    }
    


}
