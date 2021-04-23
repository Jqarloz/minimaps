<?php

namespace App\Models\Menus;

use App\Models\Category;
use App\Models\Image;
use App\Models\Reaction;
use App\Models\Review;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    public function getRouteKeyName()
    {
        return 'slug';
    }

    //Asignacion Masiva
    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    //Relacion muchos a muchos polimorficas
    public function tags()
    {
        return $this->morphToMany(Tag::class, 'taggable');
    }

    //Relacion 1 a 1 polimorfica
    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }

    //Relacion 1 a Muchos Polimorfica
    public function reviews()
    {
        return $this->morphMany(Review::class, 'reviewable');
    }

    public function reactions()
    {
        return $this->morphMany(Reaction::class, 'reactionable');
    }
    
}
