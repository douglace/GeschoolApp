<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Filiere extends Model
{
    protected $primaryKey = "filiere_id";
    protected $fillable = ["intitule", "session_id"];

    public function session(){
        return $this->belongsTo(Session::class,"session_id");
    }

    public function classes(){
        return $this->hasMany(Classe::class, "filiere_id");
    }
}
