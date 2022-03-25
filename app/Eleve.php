<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Eleve extends Model
{
    protected $primaryKey = "eleve_id";
    protected $fillable = ["matricul","nom","prenom","date","lieu","sexe", "nationalite", "adresse", "tel", "email","statut","maladie","handicap","session_id","parent_id", "user_id"];

    public function parent(){
        return $this->belongsTo(ParentEleve::class, "parent_id");
    }

    public function session(){
        return $this->belongsTo(Session::class,"session_id");
    }

    public function inscriptions(){
        return $this->hasMany(Inscription::class,"eleve_id");
    }

    public function paiements(){
        return $this->hasMany(Paiement::class,"eleve_id");
    }

    public function absences(){
        return $this->hasMany(Absence::class, 'eleve_id');
    }

    public function inscription(int $annee_id){
        return Inscription::where("eleve_id", $this->eleve_id)->where("annee_id", $annee_id)->first();
    }

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function getFullName(){
        return $this->nom." ".$this->prenom;
    }

    public function paiement(int $annee_id){
        return Paiement::where("eleve_id", $this->eleve_id)->where("annee_id", $annee_id)->first();
    }

    public function getNoteSequence(int $sequence_id, int $cours_id){
        return Note::where("sequence_id", $sequence_id)->where("cours_id", $cours_id)->where("eleve_id", $this->eleve_id)->first();
    }
}
