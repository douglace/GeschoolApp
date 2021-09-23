<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Classe extends Model
{
    protected $primaryKey = "classe_id";
    protected $guarded = ["etat"];

    public function filiere(){
        return $this->belongsTo(Filiere::class, "filiere_id");
    }

    public function session(){
        return $this->belongsTo(Session::class,"session_id");
    }

    public function inscriptions(){
        return $this->hasMany(Inscription::class,"incription_id");
    }
}
