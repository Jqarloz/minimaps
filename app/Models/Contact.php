<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    //Asignacion Masiva
    protected $guarded = ['id', 'created_at', 'updated_at'];

    //Relacion 1 a muchos polimorfica
    public function contactable()
    {
        return $this->morphTo();
    }
}
