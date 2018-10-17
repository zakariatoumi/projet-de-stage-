<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class secteur extends Model
{
    protected $fillable = ['secteur','discription','etat'];

    public function entreprise()
    {
       return $this->hasMany('App/entreprise');
    }
}
