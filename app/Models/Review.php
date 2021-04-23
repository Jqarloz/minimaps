<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    //Relacion 1 a muchos inversa
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    //Relacion 1 a muchos polimorfica
    public function reviewable()
    {
        return $this->morphTo();
    }
}
