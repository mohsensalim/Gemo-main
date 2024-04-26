<?php

namespace App\Http\Controllers\Creator\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Creator;
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
            'telephone' => ['required', 'numeric'],
            'cin' => ['required', 'string'],
            'cin_picture'=>['required', 'image', 'mimes:jpeg,png,jpg'],
            "password"=>['required','string','confirmed'],
            "password_confirmation"=>['required','string'],
        ]);
      
        $imagePath = $request->cin_picture->getPathname(); // Get the temporary path of the uploaded file
        $cin_picture = file_get_contents($imagePath); // Read the contents of the uploaded file

        $data=$request->except(['password_confirmation','_token','cin_picture']);
        $data['password'] = Hash::make($request->password);
      $data['Cin_Picture']=  $cin_picture;
        Creator::create($data);
    
       
        return redirect()->route('creator.dashboard.login');
    }



}
