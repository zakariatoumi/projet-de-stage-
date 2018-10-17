<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class entreprise extends Model
{
    protected $primaryKey = 'entrepriseId';

    protected $fillable = [
        'raisonSociale', 'capital', 'discription', 'adresse', 'siteWeb', 'logo', 'tel', 'email', 'fax', 'ville_id', 'pays_id', 'type_org_id', 'user_id'
    ];
    

    public function user()
    {
       return $this->belongTo('App/User');
    }

    public function villes()
    {
       return $this->hasMany('App/ville');
    }

    public function payss()
    {
       return $this->hasMany('App/pays');
    }

    public function type_organismess()
    {
       return $this->hasMany('App/type_organismes');
    }

    public function secteur()
    {
       return $this->belongTo('App/secteur');
    }
}
