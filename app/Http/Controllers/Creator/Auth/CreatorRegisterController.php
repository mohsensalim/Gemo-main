<?php

namespace App\Http\Controllers\Creator\Auth;

use App\Models\Creator;
use Illuminate\Http\Request;
use App\Models\Creatorpaiment;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class CreatorRegisterController extends Controller
{
    //

    public function register(){

        return view('Creator.Auth.register');
    }


    public function store(Request $request){
        
        $lastCreator = Creator::latest()->first();
        $newid = $lastCreator ? $lastCreator->id + 1 : 1;
    
        $request->merge(['id' => $newid]);
        
        $request->validate([

            "name"=>['required','string'],
            "prenom"=>['required','string'],
            "email"=>['required','string','unique:creators,email'],
            'studio_nom' => ['required', 'string', 'unique:creators'],
            'nationalite' => ['required', 'string'],
            'genre' => ['required', 'string'],
            'city' => ['required', 'string'],
            'date_naissance' => ['required', 'date','before_or_equal:' . now()->subYears(18)->format('Y-m-d')],
            'telephone' => ['required', 'numeric','unique:creators,Telephone'],
            'cin' => ['required', 'string', 'unique:creators,CCIN'],
            'cin_picture'=>['required', 'image', 'mimes:jpeg,png,jpg'],
            "password"=>['required','string','confirmed'],
            "password_confirmation"=>['required','string'],
        ]);
      
        $imagePath = $request->cin_picture->getPathname(); // Get the temporary path of the uploaded file
        $cin_picture = file_get_contents($imagePath); // Read the contents of the uploaded file

     
       Creator::create([

        'id'=>$newid,
        'name'=>$request->name,
        'Prenom'=>$request->prenom,
        'email'=>$request->email,
        'Cin_Picture'=>$cin_picture,
        'Date_Naissance'=>$request->date_naissance,
        'Genre'=>$request->genre,
        'CCIN'=>$request->cin,
        'Studio_Nom'=>$request->studio_nom,
        'Telephone'=>$request->telephone,
        'City'=>$request->city,
        'Etat'=>"inactif",
        'password'=>Hash::make($request->password),

    ]);
    
        $creatorId = $newid;
        return redirect()->route('paymentcreator', ['regestiredid' => $creatorId]);

    }

    public function getpaymentpage($creatorid)
    {
       return view('PaymentCreator', ['creatorid' => $creatorid]);

    }

    public function StorePaymentInfo(Request $request)
    {
        $creatorId = $request->route('regestiredid');
        if($request->P == "Paypal")
        {
            $request->validate([

                "paypalemail"=>['required','string','unique:creatorpaiments,Identifiant'],
                
                
            ]);

            $lastCreatorPaiment = Creatorpaiment::latest()->first();

                $newIDCP = $lastCreatorPaiment ? $lastCreatorPaiment->ID_CP + 1 : 1;
               
                        Creatorpaiment::create([

                            'ID_CP'=>$newIDCP,
                            'Mode_Paiment'=>'Paypal', 
                            'Identifiant'=>$request->paypalemail, 	 	
                            'Etat_Paiment'=>'inactif',
                            'id'=>$creatorId,
                        ]);

                        return redirect()->route('creator.dashboard.home');
        }

        if($request->B == "Bank")
        {

            $request->validate([

                "bankname"=>['required','string'],
                "rip"=>['required','string','unique:creatorpaiments,Identifiant']
                
            ]);


            $lastCreatorPaiment = Creatorpaiment::latest()->first();

            $newIDCP = $lastCreatorPaiment ? $lastCreatorPaiment->ID_CP + 1 : 1;
            Creatorpaiment::create([

                'ID_CP'=>$newIDCP,
                'Mode_Paiment'=> $request->bankname, 
                'Identifiant'=>$request->rip, 	 	
                'Etat_Paiment'=>'inactif',
                'id'=>$creatorId,
            ]);

            return redirect()->route('creator.dashboard.home');
        }

                

    }



}
