<?php

namespace App\Models;

use App\Models\Menus\Service;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Shop;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name','slug','type'];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    //Relacion uno a muchos
    public function shops()
    {
        return $this->hasMany(Shop::class);
    }

    //Relacion uno a muchos
    public function services()
    {
        return $this->hasMany(Service::class);
    }

}
