<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class type_organismes extends Model
{
    public function entrep()
    {
       return $this->hasMany('App/entreprise');
    }
}
