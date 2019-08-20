<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Planet extends Model
{
    protected $fillable = [
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

    public function filterFillableValues($data)
    {
        $filteredValues = array_filter($data,
            function ($key) {
                return in_array($key, $this->fillable);
            },
            ARRAY_FILTER_USE_KEY);
        return $filteredValues;
    }
    
    public function films() {
        return $this->belongsToMany(Film::class);
    }
}
