<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bulletin extends Model
{
    protected $primaryKey = "bulletin_id";
    protected $fillable = ["eleve_id", "annee_id", "classe_id", "moyenne" , "rang", "mention"];

    public function eleve(){
        return $this->belongsTo(Eleve::class,"eleve_id");
    }

    public function annee(){
        return $this->belongsTo(AnneeScolaire::class,"annee_id");
    }

    public function classe(){
        return $this->belongsTo(Classe::class,"classe_id");
    }
}
