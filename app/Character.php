<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Character extends Model
{
    public $fillable = [
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

    public function films() {
        return $this->belongsToMany(Film::class);
    }
}