<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Absence extends Model
{
    protected $primaryKey = 'absence_id';
    protected $fillable = ['annee_id', 'sequence_id', 'cours_id', 'eleve_id', 'nb_heure', 'absent', 'enseignant_id', 'session_id', 'absence_date'];

    public function annee (){
        return $this->belongsTo(AnneeScolaire::class, 'annee_id');
    }

    public function sequence (){
        return $this->belongsTo(Sequence::class, 'sequence_id');
    }

    public function cours (){
        return $this->belongsTo(Cours::class, 'cours_id');
    }

    public function eleve (){
        return $this->belongsTo(Eleve::class, 'eleve_id');
    }

    public function enseignant (){
        return $this->belongsTo(Enseignant::class, 'enseignant_id');
    }

    public function session () {
        return $this->belongsTo(Session::class, 'session_id');
    }
}
