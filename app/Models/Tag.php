<?php

namespace App\Models;

use App\Models\Menus\Item;
use App\Models\Menus\Job;
use App\Models\Menus\Service;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Shop;

class Tag extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug', 'color']; 

    public function getRouteKeyName()
    {
        return 'slug';
    }
    //Relacion muchos a muchos inversa polimorfica
    public function shops()
    {
        return $this->morphedByMany(Shop::class, 'taggable');
    }

    //Relacion muchos a muchos inversa polimorfica
    public function services()
    {
        return $this->morphedByMany(Service::class, 'taggable');
    }

    //Relacion muchos a muchos inversa polimorfica
    public function items()
    {
        return $this->morphedByMany(Item::class, 'taggable');
    }

    //Relacion muchos a muchos inversa polimorfica
    public function jobs()
    {
        return $this->morphedByMany(Job::class, 'taggable');
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
