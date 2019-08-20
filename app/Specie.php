<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Specie extends Model
{
    public $fillable = [
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

    public function films() {
        return $this->belongsToMany(Film::class);
    }
}
