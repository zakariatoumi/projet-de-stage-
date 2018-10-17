<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ville extends Model
{
    protected $table = 'villes';

    protected $fillable = ['nomVille', 'pays_id'];

        public function entrep()
    {
       return $this->hasMany('App/entreprise');
    }
}
