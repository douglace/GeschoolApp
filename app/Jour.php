<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jour extends Model
{
    protected $primaryKey = "jour_id";
    protected $fillable = ['intitule', 'session_id'];

    public function session (){
        return $this->belongsTo(Session::class, 'session_id');
    }

    public function emplois (){
        return $this->hasMany(Emploi::class, 'emploi_id');
    }
}
