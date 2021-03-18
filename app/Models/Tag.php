<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Shop;

class Tag extends Model
{
    use HasFactory;

    //Relacion muchos a muchos inversa polimorfica
    public function shops()
    {
        return $this->morphedByMany(Shop::class, 'taggable');
    }
    public function posts()
    {
        return $this->morphedByMany('App\Models\Post', 'taggable');
    }
    public function videos()
    {
        return $this->morphedByMany('App\Models\Video', 'taggable');
    }
}
