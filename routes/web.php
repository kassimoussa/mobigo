<?php

use App\Http\Controllers\AdministratifController;
use App\Http\Controllers\EcommerceController;
use App\Http\Controllers\FactureController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MedicalController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\SocialController;
use App\Http\Controllers\TransportController;
use Illuminate\Support\Facades\Route;

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

Route::get('/',  [HomeController::class, 'accueil']);
Route::get('/inscription',  [HomeController::class, 'inscription']);
Route::post('/register', [PatientController::class, 'register']);
Route::post('login', [HomeController::class, 'login']);

Route::group(['middleware' => ['logged']], function () {
    Route::get('/index', [HomeController::class, 'index']);
    Route::get('logout', [HomeController::class, 'logout']);

    Route::prefix('medical')->group(function (){
        Route::get('/', [MedicalController::class, 'index']);
        Route::get('/rendez-vous', [MedicalController::class, 'rendezvous']);
    }); 

    Route::prefix('administratif')->group(function (){
        Route::get('/', [AdministratifController::class, 'index']); 
    }); 

    Route::prefix('ecommerce')->group(function (){
        Route::get('/', [EcommerceController::class, 'index']); 
    }); 

    Route::prefix('factures')->group(function (){
        Route::get('/', [FactureController::class, 'index']); 
    }); 

    Route::prefix('social')->group(function (){
        Route::get('/', [SocialController::class, 'index']); 
    }); 

    Route::prefix('transport')->group(function (){
        Route::get('/', [TransportController::class, 'index']); 
    }); 



     
});