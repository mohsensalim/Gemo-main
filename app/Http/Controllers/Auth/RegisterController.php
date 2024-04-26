<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;
    
    /**
     * Where to redirect users after registration.
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
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        
    
        return Validator::make($data, [
            'name' => ['required', 'string'],
            'prenom' => ['required', 'string', ],
            'email' => ['required', 'string', 'email', 'unique:users'],
            'username' => ['required', 'string', 'unique:users'],
            'nationalite' => ['required', 'string'],
            'genre' => ['required', 'string'],
            'date_naissance' => ['required', 'date','before_or_equal:' . now()->subYears(12)->format('Y-m-d')],
            'telephone' => ['required', 'numeric'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ],
        [
            'date_naissance.before_or_equal' => 'Age must be at least 12 years old.',
        ]);
        
    }


         
    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {    $Etat = "actif";
        $Etat_Mode_Friends="inactif";
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'Prenom'=>$data['prenom'],
            'Genre'=>$data['genre'],
            'Username'=>$data['username'],
            'Nationalite'=>$data['nationalite'],
            'Date_Naissance'=>$data['date_naissance'],
            'Telephone'=>$data['telephone'],
            'Etat'=>$Etat,
            'Etat_Mode_Friend'=>$Etat_Mode_Friends,
            'password' => Hash::make($data['password']),
        ]);
    }
}
