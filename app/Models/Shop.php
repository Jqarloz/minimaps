<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\User;
use App\Models\Category;


class Shop extends Model
{
    use HasFactory;

    protected $guarded = ['id', 'created_at', 'updated_at'];
    protected $withCount = ['reactions', 'reviews'];

    public function getRouteKeyName()
    {
        return 'slug';
    }

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

    //Relacion 1 a muchos
    public function products()
    {
        return $this->hasMany(Product::class);
    }

    //Relacion uno a muchos (inversa)
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
        return $this->morphToMany('App\Models\Tag', 'taggable');
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
