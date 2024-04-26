<?php


namespace App\Http\Controllers\Creator\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Creator; 
class CreatorLoginController extends Controller
{
    //

    public function _construct()
    {
        $this->middleware('guest:creator')->except('lougout');
    }

    public function login(){

        return view('Creator.Auth.login');
    }


    public function checklogin(Request $request){

        $request->validate([

            "email"=>["required","string"],
            "password"=>["required","string"]

        ]);

        if(Auth::guard('creator')->attempt(['email'=> $request->email,'password'=>$request->password]))

        {

            return redirect()->route('creator.dashboard.home');
        }
        else{

            return redirect()->back()
            ->withInput(['email'=>$request->email])
            ->withErrors(['errorResponse'=> 'these credentials do not match our records']);
        }
        
    }


    public function logout()
    {

        Auth::guard('creator')->logout();

        return redirect()->route('creator.dashboard.login');

    }



}
