<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class PokeUserService
{
    protected $pokeApi;
    protected $pokeUser = 10;
    public function __construct()
    {
        $this->pokeApi = Http::baseUrl('https://pokeapi.co/api/v2/');
    }

    public function huntPokemon($startCount = 0, $endCount)
    {
        return $this->pokeApi->get('pokemon-species/'.rand($startCount, $endCount ?? config('constants.poke_max_id')));
    }
}
