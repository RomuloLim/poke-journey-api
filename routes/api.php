<?php

use App\Http\Controllers\PokemonContoller;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/', function(){
    $poke = Http::pokemon()->get('2')->json();

    return $poke['sprites'];
});

Route::get('/pokemon/hunt', [PokemonContoller::class, 'huntPokemon']);
Route::post('/user/save-settings', [UserController::class, 'saveSettings']);
