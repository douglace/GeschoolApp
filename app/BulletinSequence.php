<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BulletinSequence extends Model
{
    protected $primaryKey = "bulletin_sequence_id";
    protected $fillable = ["eleve_id", "annee_id", "classe_id", "sequence_id", "moyenne" , "rang", "mention"];

    public function eleve(){
        return $this->belongsTo(Eleve::class,"eleve_id");
    }

    public function annee(){
        return $this->belongsTo(AnneeScolaire::class,"annee_id");
    }

    public function sequence(){
        return $this->belongsTo(Sequence::class,"sequence_id");
    }

    public function classe(){
        return $this->belongsTo(Classe::class,"classe_id");
    }

    public function notes(){
        return $this->hasMany(Note::class, "bulletin_sequence_id");
    }

    static function getWithEleve(int $annee_id, int $sequence_id, $eleve_id){
        return BulletinSequence::where("annee_id", $annee_id)->where("sequence_id", $sequence_id)
        ->where("eleve_id", $eleve_id)->first();
    }
}
