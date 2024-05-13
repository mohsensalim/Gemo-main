<?php

namespace App\Http\Controllers;

use App\Models\game;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MainController extends Controller
{
    //


    public function index()
    {

        $games = game::all();
        $Pin = rand(9999, 1000);
        return view('MainPage',['games'=> $games,'Pin' => $Pin]);

    }

    public function modefriends(Request $request)
    {
        $etat;
        if ($request->has('etatmode')) {
            $etat="actif";
        } else {
            $etat="inactif";
        }

        $user = User::where('id',Auth::guard('web')->id())->first();
        $user->update([
                          
            'Etat_Mode_Friend'=> $etat,
            'Pin_Mode_Friend'=> $request->Pin,
                    ]);
        
        return redirect()->back()->with('success','Mode Updated With Success');
    }
    


}
