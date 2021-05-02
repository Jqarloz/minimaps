<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;

    //asignacion masiva
    protected $guarded = ['created_at', 'updated_at'];
    
    //Relacion polimorfica
    public function locationable()
    {
        return $this->morphTo();
    }
}
