<?php

namespace App\Models;

use App\Models\Menus\Item;
use App\Models\Menus\Job;
use App\Models\Menus\Service;
use App\Models\Menus\Shop;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mediable extends Model
{
    use HasFactory;

    //asignacion masiva
    protected $guarded = ['created_at', 'updated_at'];

    //Relacion muchos a muchos inversa polimorfica
    public function shops()
    {
        return $this->morphedByMany(Shop::class, 'mediable');
    }

    public function services()
    {
        return $this->morphedByMany(Service::class, 'mediable');
    }

    public function items()
    {
        return $this->morphedByMany(Item::class, 'mediable');
    }

    public function jobs()
    {
        return $this->morphedByMany(Job::class, 'mediable');
    }
}
