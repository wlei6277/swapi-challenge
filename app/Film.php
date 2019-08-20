<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
    public $fillable = [
        'episode_id',
        'url',
        'title',
        'director',
        'producer',
        'release_date',
        'opening_crawl',
        'favourited'
    ];

    public function characters () {
        return $this->belongsToMany(Character::class);
    }
    public function planets () {
        return $this->belongsToMany(Planet::class);
    }
    public function species () {
        return $this->belongsToMany(Specie::class);
    }
    public function starships () {
        return $this->belongsToMany(Starship::class);
    }
    public function vehicles () {
        return $this->belongsToMany(Vehicle::class);
    }

    
}
