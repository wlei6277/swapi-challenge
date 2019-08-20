<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Starship extends Model
{
    public $fillable = [
        'url',
        'name',
        'model',
        'starship_class',
        'cost_in_credits',
        'manufacturer',
        'length',
        'crew',
        'passengers',
        'max_atmosphering_speed',
        'hyperdrive_rating',
        'MGLT',
        'cargo_capacity',
        'consumables'
    ];
    
    public function films() {
        return $this->belongsToMany(Film::class);
    }
}
