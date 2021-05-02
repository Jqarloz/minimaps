<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    //Asignacion Masiva
    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    //Relacion 1 a muchos
    public function shops()
    {
        return $this->belongsTo(Shop::class);
    }
}
