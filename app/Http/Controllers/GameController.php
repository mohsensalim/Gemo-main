<?php

namespace App\Http\Controllers;

use App\Models\game;
use App\Models\User;
use App\Models\Creator;
use App\Models\paniergame;
use Illuminate\Http\Request;
use App\Models\Creatorpaiment;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
class GameController extends Controller
{ 

    public function show($gameid)
    {
        $game=game::where('IDG', $gameid)->first();
        return view('gamedetails',['game'=>$game]);

    }

    public function BuyGame($gameid)
    {
        $game=game::where('IDG', $gameid)->first();
        $user = User::find(Auth::guard('web')->id());
        $usercoins=$user->Coins;
        $gamecoins=$game->Jeux_Prix;
        if($usercoins<$gamecoins)
        {

            return redirect()->route('Main')->with('error','Please Buy More Gcoins');
        }
      

        $lastGame = paniergame::latest()->first();
        $newIDUG = $lastGame ? $lastGame->IDUG + 1 : 1;
        paniergame::create([
            'IDUG' => $newIDUG,
            'user_id' => Auth::guard('web')->id(),
            'IDG' => $gameid,
            'EtatAchat' => 'actif',
        ]);


       
        $newusercoins=$usercoins - $gamecoins;
        
        $user->update([
            
            'Coins'=> $newusercoins,

                    ]);


      if($game->id!=null)
                    {
                        $creator=Creator::find($game->id);
                       
                        $creatorcoins=$creator->Coins;
                        
                        $newcreatorcoins=$creatorcoins + $gamecoins;
                        $creator->update([
                          
                            'Coins'=> $newcreatorcoins,
                
                                    ]);

            $count = Creatorpaiment::where('id', $game->id)->count();

            if ($count >= 1) {
                $date = Carbon::parse(now());

                if ($date->day >= 21) {

                    $lastCreatorPaiment = Creatorpaiment::latest()->first();

                    $newIDCP = $lastCreatorPaiment ? $lastCreatorPaiment->ID_CP + 1 : 1;
                    
                    $creatoramount=  $gamecoins*0.4;
                                 Creatorpaiment::create([
        
                                    'ID_CP'=>$newIDCP,
                                    'Amount'=>$creatoramount,
                                    'Etat_Paiment'=>'inactif',
                                    'id'=>$game->id,
                                    
        
                                ]);
                
                } else {
                
                    
                    $lastCreatorPaiment = Creatorpaiment::where('id', $game->id)->latest()->first();

                    $creatoramount=$lastCreatorPaiment->Amount;
                        
                    $newcreatoramount= ($creatoramount + $gamecoins)*0.4;

                        $lastCreatorPaiment->update([
                          
                            'Amount'=> $newcreatoramount,
                
                                    ]);
                    
                }
                
                 
                                    
            } 
                                    
             else {

                $lastCreatorPaiment = Creatorpaiment::latest()->first();

                $newIDCP = $lastCreatorPaiment ? $lastCreatorPaiment->ID_CP + 1 : 1;
                $creatoramount=  $gamecoins*0.4;
                        Creatorpaiment::create([

                            'ID_CP'=>$newIDCP,
                            'Amount'=>$creatoramount,
                            'Etat_Paiment'=>'inactif',
                            'id'=>$game->id,

                        ]);
                    }

        }

        return redirect()->route('Main')->with('success','Please Check Your Library To Download The Game');
    }
    

 public function store(Request $request)
{

        $lastGame = Game::latest()->first();
        $newIDG = $lastGame ? $lastGame->IDG + 1 : 1;

        $request->merge(['IDG' => $newIDG]);

        $request->validate([
            "title" => ['required', 'string', 'unique:games'],
            "description" => ['required', 'string'],
            "main_picture" => ['required', 'image', 'mimes:jpeg,png,jpg'],
            'jeux_prix' => ['required', 'numeric', 'min:20'], // Fixed validation rule syntax
            "category" => ['required', 'string'],
            "download_path" => ['required', 'string'],
        ]);

        $imagePath = $request->main_picture->getPathname(); // Get the temporary path of the uploaded file
        $imageData = file_get_contents($imagePath); // Read the contents of the uploaded file

        // Store the screenshots
        $imageDataArray = [];
        if (!is_array($request->file('screenshots')) || count($request->file('screenshots')) !== 3) {
            return redirect()->back()->withErrors(['screenshots' => 'You Must Import 3 Screens']);
        }

        foreach ($request->file('screenshots') as $screenshot) {
            $imagePath = $screenshot->getPathname(); // Get the temporary path of the uploaded file
            $imageData = file_get_contents($imagePath); // Read the contents of the uploaded file
            $imageDataArray[] = $imageData; // Add the image data to the array
        }

        $data = $request->except(['main_picture', 'screenshots']);

        $data['etat_jeux'] = "inactif";
        $data['Screen1'] = $imageDataArray[0] ;
        $data['Screen2'] = $imageDataArray[1] ;
        $data['Screen3'] = $imageDataArray[2] ;
        $data['Main_picture'] = $imageData;
        $data['id'] = Auth::guard('creator')->id();

        game::create($data);

        return redirect()->route('creator.dashboard.home')->with('success', 'Game Added successfully!');
    }
    







public function indexlibrary()

{
    ini_set('memory_limit', '1024M');
    $gamespurchased = paniergame::where('user_id', Auth::guard('web')->id())->with('game')->get();

    
$games = $gamespurchased->map(function ($gamepurchased) {

    return $gamepurchased->game;

});

return view('library', ['games' => $games]);
}




}
