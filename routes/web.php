<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GameController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\PackController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\Auth\LoginController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



Route::get('/', [MainController::class, 'index'])->name('Main');
Route::get('/getcart', [GameController::class, 'getcart'])->name('getcart');

Route::get('/modefriends', function () {
    return view('LibraryPageModeFreinds'); 
})->name('MainMdeFriends');

Route::post('/statue', [MainController::class, 'modefriends'])->name('modefriandsstatue');

Route::post('/auth', [LoginController::class, 'Modefreindsauth'])->name('Modefriendsauth');

Route::get('/contact', function () {
    return view('Contact'); 
})->name('contact');


Route::get('/packs', [PackController::class, 'index'])->name('packs');


Route::get('/library', [GameController::class, 'indexlibrary'])->name('library');

Route::delete('/removefromocart/{gameid}', [GameController::class, 'removefromcart'])->name('removefromcart');
Route::post('/addtocart/{gameid}', [GameController::class, 'add_to_cart'])->name('addtocart');


Route::get('/Categories', function () {
    return view('Categories');
})->name('Categories');



Route::get('/profile', function () {
    return view('profile');
})->name('profile')->middleware('auth');;


Route::get('/CreatorRegister', function () {
    return view('Dashboard');
})->name('CreatorRegister');




Route::get('/gamedetails', function () {
    return view('gamedetails');
})->name('gamedetails');

Route::get('/gamedetails/{gameid}', [GameController::class, 'show'])->name('gamedetails');


Route::post('/logout', [LoginController::class, 'logout'])->name('logout')->middleware('auth');


Route::post('/buygame/{gameid}', [GameController::class, 'BuyGame'])->name('buygame')->middleware('auth');

Auth::routes();


Route::get('/GemoChat', [App\Http\Controllers\HomeController::class, 'index'])->name('Chat');

Route::post('pay/{pack}',[PaymentController::class,'pay'])->name('payment');

Route::get('success/{packid}', [PaymentController::class, 'success'])->name('payment.success');

Route::get('error', [PaymentController::class, 'error']);