<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Paiement extends Model
{
    protected $primaryKey = "paiement_id";
    protected $fillable = ["montant", "montant_paye", "reste", "eleve_id", "annee_id"];

    public function annee(){
        return $this->belongsTo(AnneeScolaire::class, "annee_id");
    }

    public function eleve(){
        return $this->belongsTo(Eleve::class, "eleve_id");
    }

    public function tranches(){
        return $this->hasMany(Tranche::class, "paiement_id");
    }
}
