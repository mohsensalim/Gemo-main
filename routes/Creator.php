<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Creator\CreatorHomeController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\Creator\Auth\CreatorLoginController;
use App\Http\Controllers\Creator\Auth\CreatorRegisterController;
/*
|--------------------------------------------------------------------------
|Creator Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::middleware('creator')->group(function () {
    // Routes accessible only to creators
    Route::get('creator/dashboard/home',[CreatorHomeController::class,'index'])->name('creator.dashboard.home')->middleware('auth:creator');
    Route::post('creator/dashboard/logout',[CreatorLoginController::class,'logout'])->name('creator.dashboard.logout');
   
    Route::post('creator/dashboard/home',[GameController::class,'store'])->name('creator.game.store');
});

// Route::get('creator/dashboard/home',[CreatorHomeController::class,'index'])->name('creator.dashboard.home')->middleware('auth:creator');

Route::get('creator/dashboard/login',[CreatorLoginController::class,'login'])->name('creator.dashboard.login')->middleware('guest:creator');;

Route::post('creator/dashboard/login',[CreatorLoginController::class,'checklogin'])->name('creator.dashboard.check');

Route::get('creator/dashboard/register',[CreatorRegisterController::class,'register'])->name('creator.dashboard.register');

Route::post('creator/dashboard/register',[CreatorRegisterController::class,'store'])->name('creator.dashboard.store');

Route::get('/paymentcreator/{regestiredid}', [CreatorRegisterController::class,'getpaymentpage'])->name('paymentcreator');

Route::post('/paymentcreator/{regestiredid}', [CreatorRegisterController::class,'StorePaymentInfo'])->name('paymentcreator');


Route::get('/contact', function () {
    return view('Contact');
})->name('contact');
// Route::post('creator/dashboard/logout',[CreatorLoginController::class,'logout'])->name('creator.dashboard.logout');