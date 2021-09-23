<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cours extends Model
{
    protected $primaryKey = "cours_id";
    protected $fillable = ["matiere_id","classe_id", "enseignant_id", "session_id","annee_id","coeficient"];

    public function matiere(){
        return $this->belongsTo(Matiere::class, "matiere_id");
    }

    public function classe(){
        return $this->belongsTo(Classe::class, "classe_id");
    }

    public function enseignant(){
        return $this->belongsTo(Enseignant::class, "enseignant_id");
    }

    public function session(){
        return $this->belongsTo(Session::class,"session_id");
    }

    public function annee(){
        return $this->belongsTo(AnneeScolaire::class,"annee_id");
    }
}
