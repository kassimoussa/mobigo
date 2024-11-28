<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PatientController;
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
        Route::get('/', [PatientController::class, 'medical']);
        Route::get('/rendez-vous', [PatientController::class, 'rendezvous']);
    }); 



     
});