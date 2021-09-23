<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Session extends Model
{
    protected $primaryKey = "session_id";
    protected $fillable = ["intitule", "annee_id"];

    public function sequences(){
        return $this->hasMany(Sequence::class, "session_id");
    }

    public function trimestres(){
        return $this->hasMany(Trimestre::class, "session_id");
    }

    public function filieres(){
        return $this->hasMany(Filiere::class, "session_id");
    }

    public function classes(){
        return $this->hasMany(Classe::class, "session_id");
    }

    public function groupe_matieres(){
        return $this->hasMany(GroupeMatiere::class, "session_id");
    }

    public function matieres(){
        return $this->hasMany(Matiere::class, "session_id");
    }

    public function eleves(){
        return $this->hasMany(Eleve::class, "session_id");
    }

    public function enseignants(){
        return $this->hasMany(Enseignant    ::class, "session_id");
    }
}
