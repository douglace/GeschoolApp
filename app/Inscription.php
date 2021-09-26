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

    static function getAllEleve(int $annee_id, int $classe_id){
        $inscriptions = Inscription::where("annee_id", $annee_id)->where("classe_id", $classe_id)->get()->all();
        $inscriptions_id = [];
        foreach($inscriptions as $inscription){
            $inscriptions_id [] = $inscription->eleve_id;
        }
        return Eleve::whereIn("eleve_id", $inscriptions_id)->get()->all();
    }
}
