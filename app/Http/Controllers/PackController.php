<?php

namespace App\Http\Controllers;

use App\Models\Pack;
use Illuminate\Http\Request;

class PackController extends Controller
{
    //

    public function index(){

        $packs= Pack::all();

        return view('packs',['packs'=>$packs]);

    }
}
