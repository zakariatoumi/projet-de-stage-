<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function publications()
    {
        return $this->belongsTo('App\Publication');
    }
}
