<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth; 
use Illuminate\Support\Facades\Session;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function logout(Request $request)
    {
       
        if (Auth::check()) {
            Auth::logout(); // Logout the currently authenticated user
            // $request->session()->invalidate();
            // $request->session()->regenerateToken();
        }
        // dd(Auth::guard('web')->check() ,Auth::guard('creator')->check());
        return redirect('/');
    }



    public function Modefreindsauth(Request $request)
    {
       
        $Username = User::where('Username', $request->Username)->first();

        if($Username)
        {
            if($Username->Etat_Mode_Friend=="actif"){
                if($Username->Pin_Mode_Friend==$request->Pin)
                {
                    echo'Auth With Success';
                }
                else{
                    echo'Auth With Error';
                }
            }
            else{
                echo'Auth With Error';
            }
            
        }else{
            echo'Auth With Error';
        }

    }
}
