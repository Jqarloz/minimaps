<?php

namespace App\Models\Menus;

use App\Models\Category;
use App\Models\Image;
use App\Models\Reaction;
use App\Models\Tag;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    public function getRouteKeyName()
    {
        return 'slug';
    }

    //Asignacion Masiva
    protected $guarded = ['id', 'created_at', 'updated_at'];

    //Metodo para rating
    protected $withCount = ['reactions', 'reviews'];

    public function getRatingAttribute()
    {
        if($this->reviews_count){
            return round($this->reviews->avg('rating'), 1);
        }else {
            return 5;
        }
    }

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

    public function reactions()
    {
        return $this->morphMany(Reaction::class, 'reactionable');
    }


}
