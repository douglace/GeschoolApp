<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Emploi extends Model
{
    protected $primaryKey = 'emploi_id';
    protected $fillable = ['annee_id', 'session_id', 'jour_id', 'classe_id', 'cours_id', 'heur_db', 'heur_fin'];

    public function annee (){
        return $this->belongsTo(AnneeScolaire::class, 'annee_id');
    }

    public function session (){
        return $this->belongsTo(Session::class, 'session_id');
    }

    public function jour (){
        return $this->belongsTo(Jour::class, 'jour_id');
    }

    public function cours() {
        return $this->belongsTo(Cours::class, 'cours_id');
    }

    public function classe (){
        return $this->belongsTo(Classe::class, 'classe_id');
    }
}
