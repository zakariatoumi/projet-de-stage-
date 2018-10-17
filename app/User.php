<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Passport\HasApiTokens;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\Models\Media;
use Cache;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nom', 'prenom', 'civ', 'tel', 'poste', 'etat', 'email', 'password','avatar','entreprise_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function entrep()
    {
       return $this->hasMany('App/entreprise');
    }

    public function likes()
    {
        return $this->hasMany('App\Like');
    }

    public function publications()
    {
        return $this->hasMany('App\Publication');
    }

    // online ofline
    public function isOnline()
    {
        return Cache::has('user-is-online-'. $this->id);
    }

}
