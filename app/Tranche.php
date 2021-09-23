<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tranche extends Model
{
    protected $primaryKey = "tranche_id";
    protected $fillable = ["montant",  "reste", "paiement_id"];

    public function paiement(){
        return $this->belongsTo(Paiement::class, "paiement_id");
    }
}
