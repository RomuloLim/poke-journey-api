<?php

namespace App\Http\Controllers;

use App\Http\Resources\PokemonResource;
use App\Services\PokeUserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

class PokemonContoller extends Controller
{
    protected $pokeUserService;

    public function __construct()
    {
        $this->pokeUserService = new PokeUserService();
    }

    public function huntPokemon()
    {
        $rand = rand(1, 20);
        $raresRandStart = 145;

        if ($rand <= 3)
            return response()->json(['You felt and loose '.rand(1, 10).' coins :(']);

        $pokeFound = $this->pokeUserService->huntPokemon($rand > 14 ? $raresRandStart : 0, config('constants.poke_max_id'))->json();
        $pokeFound['sprites_style'] = 'home';

        return new PokemonResource($pokeFound);
    }


}
