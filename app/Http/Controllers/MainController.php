<?php

namespace App\Http\Controllers;

use App\Models\game;
use Illuminate\Http\Request;

class MainController extends Controller
{
    //


    public function index()
    {

        $games = game::all();

        return view('MainPage',['games'=> $games]);

    }
}
