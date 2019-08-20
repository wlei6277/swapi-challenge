<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Planet extends Model
{
    public $fillable = [
        'url',
        'name',
        'diameter',
        'rotation_period',
        'orbital_period',
        'gravity',
        'population',
        'climate',
        'terrain',
        'surface_water'
    ];
    
    public function films() {
        return $this->belongsToMany(Film::class);
    }
}
