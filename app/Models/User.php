<?php

namespace App\Models;

use App\Models\Menus\Item;
use App\Models\Menus\Job;
use App\Models\Menus\Service;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Jetstream\HasTeams;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles; 

use App\Models\Profile;
use App\Models\Shop;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use HasTeams;
    use Notifiable;
    use TwoFactorAuthenticatable;
    use HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];

    public function profile()
    {
        //$profile = Profile::where('user_id', $this->id)->first(); //metodo por consulta 
        return $this->hasOne(Profile::class, 'user_id');
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

    //Relacion uno a muchos
    public function items()
    {
        return $this->hasMany(Item::class);
    }

    //Relacion uno a muchos
    public function jobs()
    {
        return $this->hasMany(Job::class);
    }

    public function posts()
    {
        return $this->hasMany('App\Models\Post');
    }

    public function videos()
    {
        return $this->hasMany('App\Models\Video');
    }

    public function comments()
    {
        return $this->hasMany('App\Models\Comment');
    }

    //Relacion Muchos a Muchos
    /* public function roles()
    {
        return $this->belongsToMany('App\Models\Role');
    } */

    //Relacion polimorfica
    public function image()
    {
        return $this->morphOne('App\Models\Image', 'imageable');
    }
}
