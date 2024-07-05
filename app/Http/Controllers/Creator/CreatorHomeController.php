<?php

namespace App\Http\Controllers\Creator;

use App\Models\game;
use App\Models\paniergame;
use Illuminate\Http\Request;
use App\Models\Creatorpaiment;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CreatorHomeController extends Controller
{
    //


    public function index(){

       $CreatorGames = game::where('id', Auth::guard('creator')->id())->get();
       $creatorpayinfo= Creatorpaiment::where('id', Auth::guard('creator')->id())->first();
       $CreatorInstalls = paniergame::whereIn('IDG',$CreatorGames->pluck('IDG')->values())->count();
       $creatorpaymenthistory = Creatorpaiment::where('id', Auth::guard('creator')->id())->get();
       $CreatorPurchasedgames = Paniergame::whereIn('IDG', $CreatorGames->pluck('IDG')) ->where('EtatAchat', 'actif')
       ->get();

        
       
        return view('Creator.home',['creatorpayinfo'=>$creatorpayinfo, 'creatorpaymenthistory'=>$creatorpaymenthistory , 'CreatorGames'=>$CreatorGames,
        'CreatorInstalls'=>$CreatorInstalls,'CreatorPurchasedgames'=>$CreatorPurchasedgames]);
    }
}
