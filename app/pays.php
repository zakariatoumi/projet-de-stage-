<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pays extends Model
{
    protected $table = 'pays';
    
    protected $fillable = ['nomPays'];

        public function entrep()
        {
           return $this->hasMany('App/entreprise');
        }

}
