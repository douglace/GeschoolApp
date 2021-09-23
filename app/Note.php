<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    protected $primaryKey = "note_id";
    protected $fillable = ["eleve_id", "cours_id", "sequence_id", "note" , "rang", "mention"];

    public function eleve(){
        return $this->belongsTo(Eleve::class,"eleve_id");
    }

    public function cours(){
        return $this->belongsTo(Cours::class,"cours_id");
    }

    public function sequence(){
        return $this->belongsTo(Sequence::class,"sequence_id");
    }
}
