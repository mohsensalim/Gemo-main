<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\game;
use Illuminate\Support\Facades\Auth;
class GameController extends Controller
{ 
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
$screenshots = [];
foreach ($request->file('screenshots') as $index => $screenshot) {
    $screenshots[] = $screenshot->storeAs('screenshots', 'screenshot_' . ($index + 1) . '.' . $screenshot->getClientOriginalExtension());
}

        if (!is_array($screenshots) ||count($screenshots) !== 3) {
            return redirect()->back()->withErrors(['screenshots' => 'You Must Import 3 Screens']);
        }

        foreach ($request->file('screenshots') as $screenshot) {
            $imagePath = $screenshot->getPathname(); // Get the temporary path of the uploaded file
            $imageData = file_get_contents($imagePath); // Read the contents of the uploaded file
            $imageDataArray[] = $imageData; // Add the image data to the array
        }





        $data=$request->except(['main_picture', 'screenshots']);
    
        $data['etat_jeux'] = "inactif";
        $data['Screen1'] = $imageDataArray[0];
        $data['Screen2'] = $imageDataArray[1];
        
        $data['Main_picture'] =$imageData;
        $data['id'] = Auth::guard('creator')->id();
        game::create($data);

        return redirect()->route('creator.dashboard.home')->with('success', 'Game Added successfully!');
        
    }
}
