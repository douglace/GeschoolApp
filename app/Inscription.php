<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inscription extends Model
{
    protected $primaryKey = "inscription_id";
    protected $fillable = ["eleve_id", "classe_id", "annee_id"];

    public function classe(){
        return $this->belongsTo(Classe::class, "classe_id");
    }

    public function annee(){
        return $this->belongsTo(AnneeScolaire::class,"annee_id");
    }

    public function eleve(){
        return $this->belongsTo(Eleve::class,"eleve_id");
    }

    public function getAllEleve(int $annee_id, int $classe_id){
        
    }
}
