<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Enseignant extends Model
{
    protected $primaryKey = "enseignant_id";
    protected $fillable = ["matricul","nom","prenom","date","lieu","sexe", "nationalite", "adresse", "tel", "email","diplome","session_id"];

    public function session(){
        return $this->belongsTo(Session::class,"session_id");
    }

    public function classes(){
        return $this->hasMany(Classe::class, "enseignant_id");
    }

    public function matiere(){
        return $this->belongsTo(Matiere::class, "enseignant_id");
    }

    public function getFullName(){
        return $this->nom." ".$this->prenom;
    }
}
