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

    //Relacion polimorfica
    public function image()
    {
        return $this->morphOne('App\Models\Image', 'imageable');
    }
}
