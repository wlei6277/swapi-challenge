<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Specie extends Model
{
    protected $fillable = [
        'url',
        'name',
        'classification',
        'designation',
        'average_height',
        'average_lifespan',
        'eye_colors',
        'hair_colors',
        'skin_colors',
        'language'
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
