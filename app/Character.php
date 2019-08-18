<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Character extends Model
{
    protected $fillable = [
        'url',
        'name',
        'gender',
        'birth_year',
        'eye_color',
        'hair_color',
        'skin_color',
        'height',
        'mass'
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