<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'body'];

    //Relacion uno a muchos (inversa)
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function categoria()
    {
        return $this->belongsTo('App\Models\Categoria');
    }

    //Relacion 1 a 1 polimorfica
    public function image()
    {
        return $this->morphOne('App\Models\Image', 'imageable');
    }

    //Relacion 1 a muchos polimorfica
    public function comments()
    {
        return $this->morphMany('App\Models\Comment', 'commentable');
    }
}
