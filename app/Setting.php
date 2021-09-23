<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $primaryKey = "setting_id";
    protected $fillable = ["annee_id", "nom"];

    public function annee(){
        return $this->belongsTo(AnneeScolaire::class, "annee_id");
    }
}
