<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
    protected $fillable = [
        'episode_id',
        'url',
        'title',
        'director',
        'producer',
        'release_date',
        'opening_crawl',
        'favourited'
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

    public function test() {
        return "testing";
    }

    public function characters () {
        return $this->belongsToMany(Character::class);
    }
}
