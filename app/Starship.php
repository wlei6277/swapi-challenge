<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Starship extends Model
{
    protected $fillable = [
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
