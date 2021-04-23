<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    //Relacion 1 a muchos inversa
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    //Relacion polimorfica
    public function commentable()
    {
        return $this->morphTo();
    }

    public function comments(){
        return $this->morphMany(Comment::class, 'commentable');
    }

    public function reactions(){
        return $this->morphMany(Reaction::class, 'reactionable');
    }
}
