<?php

namespace App\Models\Menus;

use App\Models\Category;
use App\Models\Contact;
use App\Models\Image;
use App\Models\Location;
use App\Models\Network;
use App\Models\Reaction;
use App\Models\Review;
use App\Models\Tag;
use App\Models\User;
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

    //Query Scope

    public function scopeCategory($query, $category_id)
    {
        if ($category_id) {
            return $query->where('category_id', $category_id);
        }         
    }

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

    public function location()
    {
        return $this->morphOne(Location::class, 'locationable');
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

    public function contacts()
    {
        return $this->morphMany(Contact::class, 'contactable');
    }

    public function networks()
    {
        return $this->morphMany(Network::class, 'networkable');
    }


}
