<?php

use App\Http\Controllers\AbstractdataController;
use App\Http\Controllers\ComiterController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\SpeakerController;
use App\Http\Controllers\SponsorController;
use App\Http\Controllers\TravelGrantController;
use App\Http\Controllers\TypeSpeakerController;
use App\Http\Controllers\TypeSponsorsController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::post('/login',[UserController::class, 'login']);

//AbstractData
Route::post('/addabstractdata',[AbstractdataController::class, 'store']);
Route::post('/verifier-paiement',[AbstractdataController::class, 'verifier']);

//Travel Grant
Route::post('/addtravel',[TravelGrantController::class, 'store']);

//Program
Route::get('/programbyday',[ProgramController::class, 'programsByDays']);
Route::get('/showprogram/{id}',[ProgramController::class, 'show']);

//Speakers
Route::get('/allpublicspeakers',[SpeakerController::class, 'allSpeakers']);
Route::get('/showpublicspeaker/{id}',[SpeakerController::class, 'showSpeaker']);

//Guests
Route::post('/addguest',[GuestController::class, 'store']);

//Comiter
Route::get('/allpubliccomiters',[ComiterController::class, 'allComiters']);

//Sponsors
Route::get('/allsponsor',[SponsorController::class, 'index']);

Route::middleware('auth:sanctum')->group(function(){

    //CurrentUser
    Route::get('/user', [UserController::class, 'User']);
    //logout
    Route::post('/logout',[UserController::class, 'logout']);

    Route::post('/user/profile/change-password/{id}', [UserController::class, 'changePassword']);

    //User
    Route::get('/alluser',[UserController::class, 'index']);
    Route::get('/showuser/{id}',[UserController::class, 'show']);
    Route::post('/adduser',[UserController::class, 'store']);
    Route::put('/updateuser/{id}',[UserController::class, 'update']);
    Route::delete('/deleteuser/{id}',[UserController::class, 'destroy']);

    //Speaker
    Route::get('/allspeaker',[SpeakerController::class, 'index']);
    Route::get('/showspeaker/{id}',[SpeakerController::class, 'show']);
    Route::post('/addspeaker',[SpeakerController::class, 'store']);
    Route::put('/updatespeaker/{id}',[SpeakerController::class, 'update']);
    Route::delete('/deletespeaker/{id}',[SpeakerController::class, 'destroy']);

    //speaker type
    Route::get('/alltypespeaker',[TypeSpeakerController::class, 'index']);
    Route::post('/addtypespeaker',[TypeSpeakerController::class, 'store']);
    Route::get('/showtypespeaker/{id}',[TypeSpeakerController::class, 'show']);
    Route::put('/updatetypespeaker/{id}',[TypeSpeakerController::class, 'update']);
    Route::delete('/deletetypespeaker/{id}',[TypeSpeakerController::class, 'destroy']);

    //Program
    Route::get('/allprogram',[ProgramController::class, 'index']);
    Route::get('/programbydate/{date}',[ProgramController::class, 'byDate']);
    Route::post('/addprogram',[ProgramController::class, 'store']);
    Route::post('/updateprogram/{id}',[ProgramController::class, 'update']);
    Route::put('/publishprogram/{id}',[ProgramController::class, 'togglePublish']);
    Route::delete('/deleteprogram/{id}',[ProgramController::class, 'destroy']);

    //Guest
    Route::get('/allguest',[GuestController::class, 'index']);
    Route::get('/showguest/{id}',[GuestController::class, 'show']);
    Route::get('/showpresenceguest/{status}',[GuestController::class, 'byPresence']);
    Route::put('/updateguest/{id}',[GuestController::class, 'update']);
    Route::put('/updateguestpresence/{id}',[GuestController::class, 'togglePresence']);
    Route::delete('/deleteguest/{id}',[GuestController::class, 'destroy']);

    //AbstractData
    Route::get('/allabstractdata',[AbstractdataController::class, 'index']);
    Route::get('/showabstractdata/{id}',[AbstractdataController::class, 'show']);
    Route::put('/updateabstractdata/{id}',[AbstractdataController::class, 'update']);
    Route::put('/acceptabstractdata/{id}',[AbstractdataController::class, 'accept']);
    Route::put('/rejectabstractdata/{id}',[AbstractdataController::class, 'reject']);
    Route::put('/markaspaidabstractdata/{id}',[AbstractdataController::class, 'markAsPaid']);
    Route::put('/markasinvitedabstractdata/{id}',[AbstractdataController::class, 'markAsInvited']);
    Route::delete('/deleteabstractdata/{id}',[AbstractdataController::class, 'destroy']);

    //Travel Grant
    Route::get('/alltravel',[TravelGrantController::class, 'index']);
    Route::get('/showtravel/{id}',[TravelGrantController::class, 'show']);
    Route::get('/showbystatus/{status}',[TravelGrantController::class, 'byStatus']);
    Route::put('/updatetravel/{id}',[TravelGrantController::class, 'update']);
    Route::put('/accepttravel/{id}',[TravelGrantController::class, 'approve']);
    Route::put('/rejecttravel/{id}',[TravelGrantController::class, 'reject']);
    Route::delete('/deletetravel/{id}',[TravelGrantController::class, 'destroy']);
    Route::delete('/travel-grants/{id}/documents/{documentIndex}', [TravelGrantController::class, 'deleteDocument']);

    //Sponsor
    Route::get('/showsponsor/{id}',[SponsorController::class, 'show']);
    Route::post('/addsponsor',[SponsorController::class, 'store']);
    Route::post('/updatesponsor/{id}',[SponsorController::class, 'update']);
    Route::delete('/deletesponsor/{id}',[SponsorController::class, 'destroy']);

    //Sponsor Type
    Route::get('/allsponsortype',[TypeSponsorsController::class, 'index']);
    Route::post('/addsponsortype',[TypeSponsorsController::class, 'store']);
    Route::get('/showsponsortype/{id}',[TypeSponsorsController::class, 'show']);
    Route::put('/updatesponsortype/{id}',[TypeSponsorsController::class, 'update']);
    Route::delete('/deletesponsortype/{id}',[TypeSponsorsController::class, 'destroy']);

    //Comiter
    Route::get('/allcomiter',[ComiterController::class, 'index']);
    Route::get('/showcomiter/{id}',[ComiterController::class, 'show']);
    Route::post('/addcomiter',[ComiterController::class, 'store']);
    Route::post('/updatecomiter/{id}',[ComiterController::class, 'update']);
    Route::delete('/deletecomiter/{id}',[ComiterController::class, 'destroy']);

});
