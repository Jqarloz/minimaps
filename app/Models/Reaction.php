<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reaction extends Model
{
    use HasFactory;

    const LIKE = 1;
    const DISLIKE = 2;

    //Relacion 1 a muchos inversa
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    //Relacion 1 a muchos inversa polimorfica
    public function reactionable(){
        return $this->morphTo();
    }
}
