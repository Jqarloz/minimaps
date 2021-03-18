<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    use HasFactory;

    //Relacion uno a Muchos (Inversa)
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    //Relacion 1 a muchos polimorfica
    public function comments()
    {
        return $this->morphMany('App\Models\Comment', 'commentable');
    }

    //Relacion muchos a muchos polimorficas
    public function tags()
    {
        return $this->morphToMany('App\Models\Tag', 'taggable');
    }
}
