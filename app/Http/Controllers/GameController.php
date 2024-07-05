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
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Response;
class GameController extends Controller
{ 

    public function show($gameid)
    {
        $user = Auth::guard('web')->id();

        $gamesadded = Paniergame::where('user_id', Auth::guard('web')->id())->pluck('IDG');
        $relatedGames = Game::whereIn('IDG', $gamesadded)->get();

        $game=game::where('IDG', $gameid)->first();
        return view('gamedetails',['game'=>$game,'gamecart' => $relatedGames]);

    }

    public function BuyGame($gameid)
    {
        $game=game::where('IDG', $gameid)->first();
        $user = User::find(Auth::guard('web')->id());

        $paniergames = paniergame::all();

foreach($paniergames as $paniergame)
    {
        
        if($paniergame->user_id == $user->id)
        {

            if($paniergame->IDG == $gameid && $paniergame->EtatAchat =="actif")
            { 
                return redirect()->back()->with('error' , 'You have already purchased this game');
               
            }

        }
        

    }
        $usercoins=$user->Coins;
        $gamecoins=$game->Jeux_Prix;
        if($usercoins<$gamecoins)
        {

            return redirect()->route('Main')->with('error','Please Buy More Gcoins');
        }
      
        $gamesadded = Paniergame::where('user_id', Auth::guard('web')->id())->pluck('IDG')->toArray();;

     
        if(!empty($gamesadded)&& in_array($gameid, $gamesadded)){

        
        if($gamesadded[0] == $gameid)
        {
            $gamepanier=Paniergame::where('user_id', Auth::guard('web')->id())->where('IDG', $gameid);

            $gamepanier->update([
                'EtatAchat'=>"actif"
            ]);
        }
    }
        else{
            $lastGame = paniergame::latest()->first();
            $newIDUG = $lastGame ? $lastGame->IDUG + 1 : 1;
            paniergame::create([
                'IDUG' => $newIDUG,
                'user_id' => Auth::guard('web')->id(),
                'IDG' => $gameid,
                'EtatAchat' => 'actif',
            ]);
        }
        

    
       
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
    $gamespurchased = paniergame::where('user_id', Auth::guard('web')->id())->where('EtatAchat', 'actif')->with('game')->get();

    
$games = $gamespurchased->map(function ($gamepurchased) {

    return $gamepurchased->game;

});

return view('library', ['games' => $games]);
}




public function add_to_cart(Request $request, $gameid)
{
    
  
    $game=game::where('IDG', $gameid)->first();

    if (!$game) {
        return response()->json(['error' => 'Game not found'], 404);
    }
    
   
    $user = Auth::guard('web')->id();
    $paniergames = paniergame::all();
   
    foreach($paniergames as $paniergame)
    {
        
        if($paniergame->user_id == $user)
        {
            if($paniergame->IDG == $gameid )
            { 
                
                return response()->json(['fail' => true]);
                
            }

            

        }
        

    }

  
    $lastGame = paniergame::latest()->first();
    $newIDUG = $lastGame ? $lastGame->IDUG + 1 : 1;
    paniergame::create([
        'IDUG' => $newIDUG,
        'user_id' => Auth::guard('web')->id(),
        'IDG' => $gameid,
        'EtatAchat' => 'inactif',
    ]);
    
   
    $games = game::all();
     session()->flash('games', $games);

    session()->flash('gamecart', json_encode($game));
    $gamecc = [
        'IDG'=> $game->IDG,
        'Title' => $game->Title,
        'Jeux_Prix' => $game->Jeux_Prix,
        'Main_Picture' => base64_encode($game->Main_Picture),
    ];
    
    return response()->json(['success' => true, 'game' =>mb_convert_encoding($gamecc, 'UTF-8', 'UTF-8')]);

}

public function removefromcart($idg)
{
    $gamecheck = paniergame::where('IDG', $idg)->first(); ;
    if(!$gamecheck)
    {
        return response('not found');
    }

    $game = paniergame::where('IDG', $idg)->delete();


    

    return response('success');
    // Optionally, redirect back or return a response
    // return redirect()->back()->with('success', 'game removed successfully');

}


function getcart()
{
    $user = Auth::guard('web')->user();
    $gamesAdded = Paniergame::where('user_id', $user->id)->where('EtatAchat', 'inactif')->pluck('IDG');
    $relatedGames = Game::whereIn('IDG', $gamesAdded)->get();
    
    // You can return whatever data you need here
    return response()->json(['relatedGames' => $relatedGames]);
}


public function myAjaxMethod(Request $request)
{
    $response = response()->json(['data' => 'Some data']);
    $response->header('http://127.0.0.1:8000/', '*');
    $response->header('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS');
    $response->header('Access-Control-Allow-Headers', 'Content-Type, Authorization');
    return $response;
}


}
