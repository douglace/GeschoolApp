<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NoteFin extends Model
{
    protected $primaryKey = "note_fin_id";
    protected $fillable = ["eleve_id", "cours_id", "bulletin_id", "note" , "rang", "mention"];

    public function eleve(){
        return $this->belongsTo(Eleve::class,"eleve_id");
    }

    public function cours(){
        return $this->belongsTo(Cours::class,"cours_id");
    }

    public function trimestre(){
        return $this->belongsTo(Trimestre::class,"trimestre_id");
    }

    public function bulletin(){
        return $this->belongsTo(Bulletin::class,"bulletin_id");
    }
}
