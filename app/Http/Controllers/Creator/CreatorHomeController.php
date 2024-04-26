<?php

namespace App\Http\Controllers\Creator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CreatorHomeController extends Controller
{
    //


    public function index(){

        return view('Creator.home');
    }
}
