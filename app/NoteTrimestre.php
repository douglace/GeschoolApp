<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NoteTrimestre extends Model
{
    protected $primaryKey = "note_trimestre_id";
    protected $fillable = ["eleve_id", "cours_id", "trimestre_id", "bulletin_trimestre_id", "note" , "rang", "mention"];

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
        return $this->belongsTo(BulletinTrimestre::class,"bulletin_trimestre_id");
    }
}
