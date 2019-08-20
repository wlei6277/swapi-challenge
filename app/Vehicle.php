<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    protected $fillable = [
        'url',
        'name',
        'model',
        'vehicle_class',
        'manufacturer',
        'length',
        'cost_in_credits',
        'crew',
        'passengers',
        'max_atmosphering_speed',
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
