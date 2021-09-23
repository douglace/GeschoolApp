<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AnneeScolaire extends Model
{
    protected $primaryKey = "annee_id";
    protected $fillable = ["debut", "fin"];

    public function paiements(){
        return $this->hasMany(Paiement::class,"annee_id");
    }

    public function getFullName(){
        return "".$this->debut."/".$this->fin."";
    }
}
