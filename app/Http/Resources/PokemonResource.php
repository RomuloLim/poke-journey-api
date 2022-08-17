<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Http;

class PokemonResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $poke = Http::pokemon()->get($this['id'])->json();
//
//        if ($this['sprites_style']){
//            $pokeSprites = $poke['other'][$this['sprites_style']];
//        }else{
            $pokeSprites = [
                'front_default' => $poke['sprites']['front_default'],
                'front_shiny' => $poke['sprites']['front_shiny'],
                'front_female' => $poke['sprites']['front_female'],
                'front_shiny_female' => $poke['sprites']['front_shiny_female'],
            ];
//        }


        return [
            'id' => $this['id'],
            'pokemon_name' => $this['name'],
            'is_baby' => $this['is_baby'],
            'is_legendary' => $this['is_legendary'],
            'is_mythical' => $this['is_mythical'],
            'text' => $this['flavor_text_entries'][0]['flavor_text'],
            'sprites' => $pokeSprites
        ];
    }
}
